<?php

namespace App\Filament\Resources\Finance\Billing\BillResource\Pages;

use Filament\Actions;
use App\Models\Customer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Finance\Billing\BillResource;

class ListBills extends ListRecords
{
    protected static string $resource = BillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Faturamento Manual')
                ->color('cyan'),
            Actions\Action::make('BillingCSV')
                ->label('Importar Fatura')
                ->color('lime')
                ->form([
                    Section::make('')
                        ->schema([
                            Select::make('customer_id')
                                ->label('Selecione o Cliente')
                                ->options(Customer::query()->pluck('company_name', 'id'))
                                ->required(),
                        ]),
                    Section::make('')
                        ->schema([
                            DatePicker::make('emission_date')->label('Data de Emissão'),
                            DatePicker::make('due_date')->label('Data de Vencimento')
                        ])->columns(2),
                    Section::make('')
                        ->schema([
                            FileUpload::make('attachment')
                                ->label('Arquivo CSV')
                                ->previewable(false)
                                ->disk('local')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                        ]),
                ])
                ->action(function (array $data): void {
                    SuportFunctions::BillingCSV($data);
                })
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('User registered')
                        ->body('The user has been created successfully.'),
                ),
            Actions\Action::make('BillingSemiAutomatic')
                ->color('emerald')
                ->label('Semi-Automatico')
                ->form([
                    Section::make('')
                        ->schema([
                            Select::make('customer_id')
                                ->label('Selecione o Cliente')
                                ->options(Customer::query()->pluck('company_name', 'id'))
                                ->required(),
                        ]),
                    Section::make('')
                        ->schema([
                            DatePicker::make('initial_date')->label('Data Inicial'),
                            DatePicker::make('final_date')->label('Data Final')
                        ])->columns(2)
                ])
                ->action(function (array $data): void {
                    SuportFunctions::BillingSemiAutomatic($data);
                })
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('User registered')
                        ->body('The user has been created successfully.'),
                ),

        ];
    }
}
