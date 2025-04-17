<?php

namespace App\Services\Banks\Itau;

use Illuminate\Support\Str;
use App\Utils\BankConnection;
use App\Interfaces\BankInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Services\Banks\Itau\Methods\Baixa;
use App\Services\Banks\Itau\Methods\Token;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Itau\Methods\Desconto;
use App\Services\Banks\Itau\Methods\GeraBoleto;
use App\Services\Banks\Itau\Methods\DataVencimento;
use App\Services\Banks\Itau\Methods\ConsultarBoleto;

class Itau implements BankInterface
{

    private static string $id_beneficiario;
    private static string $carteira;
    private static array $data;
    private static PendingRequest $request;

    use ConsultarBoleto, GeraBoleto, Baixa, Desconto, DataVencimento, Token, BankConnection;

    public function __construct(...$args)
    {
        dd(...$args);
        static::$data = $args;
        static::$id_beneficiario = $args['agencia'] . $args['conta'] . $args['conta_dv'];
        static::$carteira = $args['wallet'];
        $this->refreshToken($args);
        static::$request = $this->make($args, $this->getHeaders());

    }

    public function makeOurNumber(array $data): string
    {
        return rand(1000000000, 9999999999);
    }

    public function makeBarCode(array $data): string
    {
        return '1234567890123456789012345678901234567890';
    }

    public function gerarBoleto(array $data): object
    {
        return self::transform($this->gerar($data));
    }

    public function consultarBoleto(array $data): object
    {
        return self::transform($this->consulta($data));
    }

    public function baixarBoleto(array $data): object
    {
        return self::transform($this->efetuarBaixa($data));
    }

    public function incluirDesconto(array $data): object
    {
        return self::transform($this->incluirDesconto($data));
    }

    public function alterarVecimento(array $data): object
    {
        return self::transform($this->alterarVencimento($data));
    }

    private static function transform(mixed $json): Collection
    {
        return collect($json)
            ->map(fn($items) => new Itau($items));
    }

    public function getHeaders(): array
    {
        return [
            'x-itau-apikey' => static::$data['client_secret'],
            'x-itau-correlationID' => static::$data['client_id'],
            'x-itau-flowID' => Str::uuid(),
            'Accept' => 'application/json',
            'x-itau-client-cert' => Storage::path(path: static::$data['path_crt']),
            'Host' => 'secure.api.cloud.itau.com.br'
        ];
    }
}
