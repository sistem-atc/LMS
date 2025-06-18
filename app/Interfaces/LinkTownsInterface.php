<?php

namespace App\Interfaces;

use App\Services\Towns\DTO\TownConfig;

interface LinkTownsInterface
{
    public function __construct(TownConfig $config);
    public function gerarNota(array $data): string|int|array;
    public function consultarNota(array $data): string|int|array;
    public function cancelarNota(array $data): string|int|array;
    public function substituirNota(array $data): string|int|array;
    public function mountMensage(\SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void;
    public function parseXmlToArray(string $xmlString, string $xpath, string $namespace = ''): array;
}
