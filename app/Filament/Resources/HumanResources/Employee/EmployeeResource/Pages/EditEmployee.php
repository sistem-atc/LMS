<?php

namespace App\Filament\Resources\HumanResources\Employee\EmployeeResource\Pages;

use Filament\Actions;
use Filament\Actions\ActionGroup;
use Filament\Support\Enums\ActionSize;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\HumanResources\Employee\EmployeeResource;
use App\Models\User;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Actions\DeleteAction::make(),
                Actions\ForceDeleteAction::make(),
                Actions\RestoreAction::make(),
            ])
                ->label('More actions')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size(ActionSize::Small)
                ->color('primary')
                ->button()
                ->hidden(fn() => ! auth()->user()->hasRole('super_admin')),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if( !$data['is_active']) {
            User::find($data['user_id'])->update([
                'is_active' => false,
            ]);
        } else {
            User::find($data['user_id'])->update([
                'is_active' => true,
            ]);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
