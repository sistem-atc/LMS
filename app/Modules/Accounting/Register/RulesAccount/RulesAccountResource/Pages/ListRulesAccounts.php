<?php

namespace App\Modules\Accounting\Register\RulesAccount\RulesAccountResource\Pages;

use App\Modules\Accounting\Register\RulesAccount\RulesAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRulesAccounts extends ListRecords
{
    protected static string $resource = RulesAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
