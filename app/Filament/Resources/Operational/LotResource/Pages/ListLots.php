<?php

namespace App\Filament\Resources\Operational\LotResource\Pages;

use Filament\Actions;
use App\Models\Customer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Operational\LotResource;

class ListLots extends ListRecords
{
    protected static string $resource = LotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Criar Lote'),
            Actions\Action::make('ImportNotFis')
                ->label('Importar NOTFIS')
                ->form([
                    Section::make('')
                    ->schema([
                        Section::make('')
                        ->schema([
                            Select::make('customer_id')
                                ->label('Selecione o Cliente')
                                ->options(Customer::query()->pluck('company_name', 'id'))
                                ->required(),
                        ]),
                        FileUpload::make('attachment')
                            ->label('Arquivo NOTFIS')
                            ->previewable(false)
                            ->disk('local')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                    ]),
                ])
                ->action(fn (array $data): Notification => SuportFunctions::ImportNotFis($data)),
            Actions\Action::make('ImportXml')
                ->label('Importar XML da Notas')
                ->form([
                    Section::make('')
                    ->schema([
                        FileUpload::make('attachment')
                            ->label('Arquivos XMLs')
                            ->multiple()
                            ->previewable(false)
                            ->disk('local')
                            ->preserveFilenames()
                    ]),
                ])
                ->action(fn (array $data): Notification => SuportFunctions::ImportXml($data))
        ];
    }
}
