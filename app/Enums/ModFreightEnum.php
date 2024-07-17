<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ModFreightEnum: int implements HasLabel
{

    case Contratação_do_Frete_por_conta_do_Remetente_CIF = 0;
    case Contratação_do_Frete_por_conta_do_Destinatário_FOB = 1;
    case Contratação_do_Frete_por_conta_de_Terceiros = 2;
    case Transporte_Próprio_por_conta_do_Remetente = 3;
    case Transporte_Próprio_por_conta_do_Destinatário = 4;
    case Sem_Ocorrência_de_Transporte = 5;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Contratação_do_Frete_por_conta_do_Remetente_CIF => 'Contratação do Frete por conta do Remetente (CIF)',
            self::Contratação_do_Frete_por_conta_do_Destinatário_FOB => 'Contratação do Frete por conta do Destinatário (FOB)',
            self::Contratação_do_Frete_por_conta_de_Terceiros => 'Contratação do Frete por conta de Terceiros',
            self::Transporte_Próprio_por_conta_do_Remetente => 'Transporte Próprio por conta do Remetente',
            self::Transporte_Próprio_por_conta_do_Destinatário => 'Transporte Próprio por conta do Destinatário',
            self::Sem_Ocorrência_de_Transporte => 'Sem Ocorrência de Transporte',
        };
    }

}
