<?php

namespace App\Services\Utils\Towns\Interfaces;

use SimpleXMLElement;

interface LinkTownsInterface
{

    public function gerarNota(array $data): string|int|array;
    public function consultarNota(array $data): string|int|array;
    public function cancelarNota(array $data): string|int|array;

}
