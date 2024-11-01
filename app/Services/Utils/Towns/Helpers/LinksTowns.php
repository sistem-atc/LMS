<?php

namespace App\Services\Utils\Towns\Helpers;

class LinksTowns
{

    protected $links = [
        '1302603' => 'https://nfse-prd.manaus.am.gov.br/nfse/servlet/|2.02', //Manaus - AM
        '4204608' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Criciuma
        '4209003' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Joacaba
        '4208906' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Jaraguá do Sul
        '4209300' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Lages
        '5218805' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Rio Verde - GO
        '4205407' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS|2.02', //Florianopolis
        '4317103' => 'https://nfe.sdolivramento.com.br/webservice/index/producao', //Sant'Ana de Livramento
        '1500800' => 'https://ananindeua-pa.desenvolvecidade.com.br/nfsd/IntegracaoNfsd', //Ananindeua
        '3170701' => 'https://nfe.etransparencia.com.br/mg.varginha/webservice/aws_nfe.aspx', //Varginha
        '2504603' => 'http://conde.aossoftware.com.br:8686/IssWeb-ejb/IssWebWS/IssWebWS', //Conde - PB
        '5008305' => 'http://issweb.treslagoas.ms.gov.br:8080/IssWeb-ejb/IssWebWS/IssWebWS', //Tres Lagoas
        '1100122' => 'https://nfse.ji-parana.ro.gov.br/IssWeb-ejb/IssWebWS/IssWebWS', //Ji-Paraná
        '3549904' => 'https://notajoseense.sjc.sp.gov.br/notafiscal-ws/NotaFiscalSoap|1', //São José do Campos
        '4115200' => 'https://nfse-ws.ecity.maringa.pr.gov.br/MaringaNfse.asmx', //Maringa - PR
        '4108403' => 'https://www.esnfs.com.br:8444/enfsws/services/Enfs.EnfsHttpsSoap12Endpoint/|35', //Francisco Beltrão
        '3148004' => 'http://187.72.229.145:8089/webservice/eSiat.asmx|', //Patos de Minas
        '1504208' => '|601870361035', //Marabá - PA

    ];

    public function getLinkTown($codeIbge)
    {
        return $this->links[$codeIbge] ?? null;
    }
}
