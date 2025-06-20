<?php

namespace App\Services\Banks\Banks\Itau;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Services\Banks\DTO\BankResponse;
use App\Interfaces\TokenResolverInterface;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Banks\Template\BankTemplate;

class Itau extends BankTemplate
{
    protected string $id_beneficiario;
    protected string $carteira;
    protected array $data;
    protected string $token;
    protected TokenResolverInterface $resolver;
    protected PendingRequest $pendingRequest;

    use Methods\ConsultarBoleto;
    use Methods\GeraBoleto;
    use Methods\Baixa;
    use Methods\Desconto;
    use Methods\DataVencimento;
    use Methods\NossoNumero;
    use Methods\CodigoBarras;

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
            ->setHeaders(headers: $this->getHeaders())
            ->setBaseUrl(url: $this->config['base_url'])
            ->setToken(token: $this->token)
            ->setCerts(certPath: $this->config['path_crt'], keyPath: $this->config['path_key'])
            ->setChannel(channel: 'itau')
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
        return $this->makeOwnNumber(data: $data);
    }

    public function makeBarCode(array $data): string
    {
        return $this->makeCodeBar(data: $data);
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
        return collect(value: $json)
            ->map(callback: fn($items): BankResponse => new BankResponse(data: $items));
    }

}
