<?php

namespace App\Services\Utils\Banks\Connectors;

use Illuminate\Support\Collection;
use App\Services\Banks\Itau\Entities\Itau;
use App\Services\Banks\Itau\Methods\Baixa;
use App\Services\Banks\Itau\Methods\Desconto;
use App\Services\Banks\Itau\Methods\GeraBoleto;
use App\Services\Banks\Itau\Concerns\ItauConfig;
use App\Services\Banks\Itau\Methods\DataVencimento;
use App\Services\Banks\Itau\Methods\ConsultarBoleto;
use App\Services\Utils\Banks\Connectors\BankConnector;

class ItauConnector extends BankConnector
{

    use ItauConfig, ConsultarBoleto, GeraBoleto, Baixa, Desconto, DataVencimento;

    public function __construct(... $args)
    {
        static::$modelBank = data_get($args, 'model');
        static::$customer = data_get($args, 'customer');
        static::$id_beneficiario = self::$modelBank->agencia . self::$modelBank->conta . self::$modelBank->conta_dv;
        static::$carteira = self::$modelBank->wallet;

        $this->bootItauConfig(static::$modelBank);

    }

    public function gerarBoleto(array $data): object
    {
        return self::transform(self::gerar($data));
    }

    public function consultarBoleto(array $data): object
    {
        return self::transform(self::consulta($data));
    }

    public function baixarBoleto(array $data): object
    {
        return self::transform(self::efetuarBaixa($data));
    }

    public function incluirDesconto(array $data): object
    {
        return self::transform(self::incluirDesconto($data));
    }

    public function alterarVecimento(array $data): object
    {
        return self::transform(self::alterarVencimento($data));
    }

    private static function transform(mixed $json): Collection
    {
        return collect($json)
                ->map(fn ($items) => new Itau($items));
    }

}
