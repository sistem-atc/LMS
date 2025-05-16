<?php

namespace App\Services\Banks\Banks\Itau;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Services\Banks\DTO\BankDTO;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\TokenResolverInterface;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Template\BankTemplate;
use App\Services\Banks\Banks\Itau\Methods\Baixa;
use App\Services\Banks\Banks\Itau\Methods\Desconto;
use App\Services\Banks\Banks\Itau\Methods\GeraBoleto;
use App\Services\Banks\Banks\Itau\Methods\DataVencimento;
use App\Services\Banks\Banks\Itau\Methods\ConsultarBoleto;

class Itau extends BankTemplate
{
    protected string $id_beneficiario;
    protected string $carteira;
    protected array $data;
    protected string $token;
    protected TokenResolverInterface $resolver;
    protected PendingRequest $pendingRequest;

    use ConsultarBoleto;
    use GeraBoleto;
    use Baixa;
    use Desconto;
    use DataVencimento;

    public function __construct(TokenResolverInterface $resolver, protected array $config)
    {
        $this->resolver = $resolver;
        parent::__construct(config: $config);
        $this->initialize();
    }

    private function initialize(): void
    {
        $this->token = $this->resolver->getToken();
        $this->data = $this->config;
        $this->id_beneficiario = $this->config['agencia'] . $this->config['conta'] . $this->config['conta_dv'];
        $this->carteira = $this->config['wallet'];
        $this->pendingRequest = $this->configureHttp();
    }

    protected function configureHttp(): PendingRequest
    {
        return $this->makeHttpClient()
            ->setHeaders($this->getHeaders())
            ->setBaseUrl($this->config['base_url'])
            ->setToken($this->token)
            ->setCerts($this->config['path_crt'], $this->config['path_key'])
            ->setChannel('itau')
            ->make();
    }

    public function getHeaders(): array
    {
        return [
            'x-itau-apikey' => $this->data['client_secret'],
            'x-itau-correlationID' => $this->data['client_id'],
            'x-itau-flowID' => Str::uuid(),
            'Accept' => 'application/json',
            'x-itau-client-cert' => Storage::path(path: $this->data['path_crt']),
            'Host' => 'secure.api.cloud.itau.com.br'
        ];
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
            ->map(fn($items) => new BankDTO($items));
    }

}
