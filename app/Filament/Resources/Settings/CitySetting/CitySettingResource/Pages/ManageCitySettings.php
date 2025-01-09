<?php

namespace App\Filament\Resources\Settings\CitySetting\CitySettingResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Filament\Resources\Settings\CitySetting\CitySettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCitySettings extends ManageRecords
{
    protected static string $resource = CitySettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Configurar Prefeitura'),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
