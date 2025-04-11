<?php

namespace App\Interfaces;

interface LinkTownsInterface
{

    public function gerarNota(array $data): string|int|array;
    public function consultarNota(array $data): string|int|array;
    public function cancelarNota(array $data): string|int|array;
    public function substituirNota(array $data): string|int|array;

}
