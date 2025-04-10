<?php

namespace App\Services\ConsultaCep\Entities;

class MapCep
{

    public ?string $cep;
    public ?string $logradouro;
    public ?string $complemento;
    public ?string $unidade;
    public ?string $bairro;
    public ?array $localidade;
    public ?array $uf;
    public ?array $estado;
    public ?array $regiao;
    public ?array $ibge;
    public ?array $gia;
    public ?array $ddd;
    public ?array $siafi;

    public function __construct(array $data)
    {
        $this->cep = data_get($data, 'cep');
        $this->logradouro = data_get($data, 'logradouro');
        $this->complemento = data_get($data, 'complemento');
        $this->unidade = data_get($data, 'unidade');
        $this->bairro = data_get($data, 'bairro');
        $this->localidade = data_get($data, 'localidade');
        $this->uf = data_get($data, 'uf');
        $this->estado = data_get($data, 'estado');
        $this->regiao = data_get($data, 'regiao');
        $this->ibge = data_get($data, 'ibge');
        $this->gia = data_get($data, 'gia');
        $this->ddd = data_get($data, 'ddd');
        $this->siafi = data_get($data, 'siafi');

    }

}
