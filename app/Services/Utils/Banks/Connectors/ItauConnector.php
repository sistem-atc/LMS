<?php

namespace App\Services\Utils\Connectors;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Services\Banks\Itau\Entities\Itau;
use App\Services\Banks\Itau\Methods\Baixa;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Itau\Methods\Desconto;
use App\Services\Banks\Itau\Methods\GeraBoleto;
use App\Services\Utils\Interface\BankInterface;
use App\Services\Banks\Itau\Concerns\ItauConfig;
use App\Services\Banks\Itau\Methods\DataVencimento;
use App\Services\Banks\Itau\Methods\ConsultarBoleto;

abstract class ItauConnector implements BankInterface
{

    use ItauConfig;

    use ConsultarBoleto, GeraBoleto, Baixa, Desconto, DataVencimento;

    private static string $carteira;
    private static string $id_beneficiario;

    public function __construct(
        protected ?PendingRequest $http,
        protected Model $modelBank
    ) {
        $this->id_beneficiario = $modelBank->agencia . $modelBank->conta . $modelBank->conta_dv;
        $this->carteira = $modelBank->wallet;
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
