<?php

namespace App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource;

class ListDocumentFiscalCustomers extends ListRecords
{
    protected static string $resource = DocumentFiscalCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Inserir NF'),
            Actions\Action::make('ImportNotFis')
                ->label('Importar NOTFIS')
                ->form([
                    Section::make('')
                        ->schema([
                            FileUpload::make('attachment')
                                ->label('Arquivo NOTFIS')
                                ->previewable(false)
                                ->disk('local')
                                ->preserveFilenames()
                                ->directory('notfis_import')
                                ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                        ]),
                ])
                ->action(fn(array $data): Notification => SuportFunctions::ImportNotFis($data)),
            Actions\Action::make('ImportXml')
                ->label('Importar XML')
                ->form([
                    Section::make('')
                        ->schema([
                            FileUpload::make('attachment')
                                ->label('Arquivos XMLs')
                                ->multiple()
                                ->previewable(false)
                                ->disk('local')
                                ->preserveFilenames()
                                ->directory('xml_import')
                        ]),
                ])
                ->action(fn(array $data): Notification => SuportFunctions::ImportXml($data)),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
