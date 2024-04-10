<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
enum TypeBranchEnum: string implements HasLabel, HasColor
{
    case MATRIZ = 'Matriz';
    case FILIAL = 'Filial';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MATRIZ => 'Matriz',
            self::FILIAL => 'Filial',
        };
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::MATRIZ => 'primary',
            self::FILIAL => 'secundary',
        };
    }
}
