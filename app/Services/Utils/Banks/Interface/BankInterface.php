<?php

namespace App\Services\Utils\Banks\Interface;

interface BankInterface
{

    public function gerarBoleto(array $data): object;
    public function consultarBoleto(array $data): object;
    public function baixarBoleto(array $data): object;
    public function incluirDesconto(array $data): object;
    public function alterarVecimento(array $data): object;

}
