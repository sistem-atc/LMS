<?php

namespace App\Filament\Pages;

use Filament\Panel;
use ReflectionClass;
use App\Models\User;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Enums\TypeBranchEnum;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use App\Filament\MenuItems\MenuItems;
use Filament\Forms\Components\Select;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Component;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class Settings extends Page implements HasForms
{

    use InteractsWithForms, HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public ?array $data = [];
    protected static string $view = 'filament.pages.settings';
    protected static bool $shouldRegisterNavigation = false;
    protected ?string $heading = 'Alterar Dados de Acesso';
    protected static ?string $slug = 'settings';
    protected static Panel $currentModule;

    public function mount(): void
    {

        Session()->has('dateBase') ?
            $datebase = session()->get('dateBase') :
            $datebase = today()->format('d/m/Y');

        $this->form->fill([
            'branch_logged_id' => Filament::auth()->user()->branch_logged->id,
            'dateBase' => $datebase,
            'module' => Filament::getCurrentPanel()->getId(),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                $this->getBrancheLoggedComponent(),
                                $this->getDatebaseComponent(),
                                $this->getModuleComponent(),
                            ])->columns(2),
                    ])->columns(2)

            ])
            ->statePath('data');
    }

    protected function getRedirectUrl()
    {
        return redirect()->to(static::$currentModule->getUrl());
    }

    protected function getModuleComponent(): Component
    {
        return
            Select::make('module')
            ->label('Módulo')
            ->required()
            ->options(MenuItems::getPanelsAvaliables());
    }

    protected function getBrancheLoggedComponent(): Component
    {

        return
            Select::make('branch_logged_id')
            ->label('Filial Logada')
            ->required()
            ->options(
                fn() => Filament::auth()->user()->employee->branch['type_branch'] === TypeBranchEnum::MATRIZ
                    ? Branch::all()->pluck('abbreviation', 'id')->toArray()
                    : Branch::where('id', '=', Auth::user()->employee->branch['id'])
                    ->pluck('abbreviation', 'id')->toArray()
            );
    }

    protected function getDatebaseComponent(): Component
    {
        return
            DatePicker::make('dateBase')
            ->label('Data Base')
            ->format('d/m/Y');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->color(Color::Blue)
                ->label('Alterar')
                ->submit('save'),
        ];
    }

    public function save(): void
    {

        try {

            $data = $this->form->getState();

            static::$currentModule = Filament::getPanel($data['module']);

            User::where('id', Filament::auth()->user()->id)
                ->update([
                    'branch_logged_id' => $data['branch_logged_id'],
                    'remember_last_module' => $data['module'],
                ]);

            session()->put('dateBase', $data['dateBase']);

            Notification::make()
                ->success()
                ->color('success')
                ->duration(3000)
                ->title('Dados Alterados com sucesso!')
                ->send();
        } catch (Halt $exception) {

            Notification::make()
                ->warning()
                ->color('warning')
                ->duration(3000)
                ->title('Erro ao alterar dados')
                ->body($exception)
                ->send();
        }

        self::getRedirectUrl();
    }

    public static function canAccess(): bool
    {
        return true;
    }
}
