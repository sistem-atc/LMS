<?php

namespace App\Enums;

enum MotivosCancelamento: string
{
    case SERVICO_NAO_REALIZADO = 'Serviço Não Realizado';
    case DADOS_CADASTRAIS_INCORRETOS = 'Dados Cadastrais Incorretos';
    case DIVERGENCIA_PRECO_SERVICO = 'Divergencia Preço Servico';
    case OUTROS_DADOS_INCORRETOS = 'Outros Dados Incorretos';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SERVICO_NAO_REALIZADO => 'Serviço Não Realizado',
            self::DADOS_CADASTRAIS_INCORRETOS => 'Dados Cadastrais Incorretos',
            self::DIVERGENCIA_PRECO_SERVICO => 'Divergencia Preço Servico',
            self::OUTROS_DADOS_INCORRETOS => 'Outros Dados Incorretos',
        };
    }
}
