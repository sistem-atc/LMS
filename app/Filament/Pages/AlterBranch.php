<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Branch;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Pages\Dashboard;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Component;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class AlterBranch extends Page implements HasForms
{

    use InteractsWithForms, HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation = false;
    public ?array $data = [];
    protected static string $view = 'filament.pages.alter-branch';
    protected ?string $heading = 'Alterar Filial e Data Base';

    public function mount(): void{
        $this->form->fill(auth()->user()->branch_logged->attributesToArray());
    }

    public function form(Form $form): Form{
        return $form
            ->schema([
                Grid::make()
                ->schema([
                    Section::make()
                        ->schema([
                            $this->getBrancheLoggedComponent(),
                            DatePicker::make('DateBase')
                                ->label('Data Base')
                                ->format('d/m/Y')
                                ->afterStateHydrated(
                                    fn (DatePicker $component, ?string $state) =>
                                        !$state ?
                                        $component->state(now()->toDateString()) :
                                        session()->get('DateBase')
                                )
                        ])->columns(2),
                ])->columns(2)

            ])
            ->statePath('data');
    }

    protected function getRedirectUrl()
    {
        return redirect()->to(Dashboard::getUrl());
    }

    protected function getBrancheLoggedComponent(): Component
    {

        return
           Select::make('branch_logged_id')
                ->label('Filial Logada')
                ->required()
                ->options(
                    fn() => Auth::user()->branch['type_branch'] === 'Matriz'
                        ? Branch::all()->pluck('abbreviation', 'id')->toArray()
                        : Branch::where('id','=', Auth::user()->branch['id'])
                                    ->pluck('abbreviation', 'id')->toArray()
                );
    }

    protected function getFormActions(): array{
        return [
            Action::make('save')
                ->color(Color::Blue)
                ->label('Alterar')
                ->submit('save'),
        ];
    }

    public function save(): void{

        try {
            $data = $this->form->getState();
            User::where('id', Filament::auth()->user()->id)->update(['branch_logged_id' => $data['branch_logged_id'],]);
            session()->put('DateBase', $data['DateBase']);

            Notification::make()
                ->success()
                ->title('Dados Alterados com sucesso!')
                ->send();
        } catch (Halt $exception) {
            Notification::make()
                ->warning()
                ->title('Erro ao alterar Filial')
                ->body($exception)
                ->send();
        }

        self::getRedirectUrl();

    }

}
