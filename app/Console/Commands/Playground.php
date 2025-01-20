<?php

namespace App\Console\Commands;

use DOMDocument;
use Carbon\Carbon;
use App\Models\CitySetting;
use Illuminate\Console\Command;
use App\Services\CnpjWs\CnpjWsService;
use App\Services\ConsultaCep\ConsultaCep;
use App\Services\MultiEmbarcador\MultiEmbarcador;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $functions = [
            'ConsultaCep' => fn($cep) => ConsultaCep::consultaCEP($cep),
            'CnpjWs' => fn($cnpj) => CnpjWsService::consultaCNPJ($cnpj),
            'MultiEmbarcador' => fn($date_Initial, $date_Out, $firstCte = 0) => MultiEmbarcador::BuscarCTes($date_Initial, $date_Out, $firstCte),
        ];

        dd($functions['ConsultaCep']('1302603'));

        // MONTAR XML DE FORMA PROGRAMATICA
        $dom = new DOMDocument('1.0', 'utf-8');

        // Criar o nó raiz com o namespace
        $envelope = $dom->createElementNS('http://schemas.xmlsoap.org/soap/envelope/', 'soapenv:Envelope');
        $dom->appendChild($envelope);

        // Definir os namespaces diretamente no nó raiz
        $envelope->setAttribute('xmlns:soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');
        $envelope->setAttribute('xmlns:e', 'http://www.e-nfs.com.br');

        // Criar o Header
        $header = $dom->createElement('soapenv:Header');
        $envelope->appendChild($header);

        // Criar o Body
        $body = $dom->createElement('soapenv:Body');
        $envelope->appendChild($body);

        // Criar o ConsultarNfse.Execute dentro do Body
        $consultarNfse = $dom->createElement('e:ConsultarNfse.Execute');
        $body->appendChild($consultarNfse);

        // Adicionar os nós Nfsecabecmsg e Nfsedadosmsg dentro de ConsultarNfse.Execute
        $consultarNfse->appendChild($dom->createElement('e:Nfsecabecmsg'));
        $consultarNfse->appendChild($dom->createElement('e:Nfsedadosmsg'));

        dd($dom->saveXML());

        $arrayData = [
            'Prestador' => [
                'cnpj' => '18575072000122',
                'inscricaoMunicipal' => 854776,
            ],
            'PeriodoEmissao' => [
                'dataInicial' => Carbon::now()->format('Y-m-d H:i:s'),
                'dataFinal' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $ibgeCode = '1302603';
        $class = CitySetting::where('ibge', $ibgeCode)->first();

        $abaco = app($class->class_path, ['configLoader' => $class->toArray()]);
        dd($abaco->ConsultarNfse($arrayData));

        return Command::SUCCESS;
    }
}
