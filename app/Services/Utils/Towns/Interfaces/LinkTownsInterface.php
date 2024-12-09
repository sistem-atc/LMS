<?php

namespace App\Services\Utils\Towns\Interfaces;

interface LinkTownsInterface
{

    public function gerarNota(array $data): string|int|array;

    public function consultarNota(array $data): string|int|array;

    public function cancelarNota(array $data): string|int|array;
}
