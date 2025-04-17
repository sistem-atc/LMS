<?php

namespace App\Interfaces;

interface BankInterface
{

    public function gerarBoleto(array $data): object;
    public function consultarBoleto(array $data): object;
    public function baixarBoleto(array $data): object;
    public function incluirDesconto(array $data): object;
    public function alterarVecimento(array $data): object;
    public function makeOurNumber(array $data): string;
    public function makeBarCode(array $data): string;
    public function getHeaders(): array;

}
