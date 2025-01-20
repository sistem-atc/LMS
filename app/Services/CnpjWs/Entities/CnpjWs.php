<?php

namespace App\Services\CnpjWs\Entities;

class CnpjWs
{

    public ?string $cnpj_raiz;
    public ?string $razao_social;
    public ?string $capital_social;
    public ?string $responsavel_federativo;
    public ?string $atualizado_em;
    public ?array $porte;
    public ?array $natureza_juridica;
    public ?array $qualificacao_do_responsavel;
    public ?array $socios;

    public function __construct(array $data)
    {
        $this->cnpj_raiz = data_get($data, 'cnpj_raiz');
        $this->razao_social = data_get($data, 'razao_social');
        $this->capital_social = data_get($data, 'capital_social');
        $this->responsavel_federativo = data_get($data, 'responsavel_federativo');
        $this->atualizado_em = data_get($data, 'atualizado_em');
        $this->porte = data_get($data, 'porte');
        $this->natureza_juridica = data_get($data, 'natureza_juridica');
        $this->qualificacao_do_responsavel = data_get($data, 'qualificacao_do_responsavel');
        $this->socios = data_get($data, 'socios');

    }

}
