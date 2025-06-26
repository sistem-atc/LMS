<?php

namespace App\Modules\Accounting\Register\RulesAccount\RulesAccountResource\Pages;

use App\Modules\Accounting\Register\RulesAccount\RulesAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRulesAccount extends EditRecord
{
    protected static string $resource = RulesAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
