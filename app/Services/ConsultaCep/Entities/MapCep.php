<?php

namespace App\Services\ConsultaCep\Entities;

class MapCep
{

    public ?string $error;
    public ?string $cep;
    public ?string $logradouro;
    public ?string $complemento;
    public ?string $unidade;
    public ?string $bairro;
    public ?string $localidade;
    public ?string $uf;
    public ?string $estado;
    public ?string $regiao;
    public ?string $ibge;
    public ?string $gia;
    public ?string $ddd;
    public ?string $siafi;

    public function __construct($data)
    {
        $this->error = data_get($data, 'error');
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
