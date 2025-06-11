<?php

namespace App\Services\SpedCte;

use App\Services\SpedCte\DTO\SpedCteConfig;
use App\Services\SpedCte\Suport\MontaChave;
use stdClass;
use NFePHP\CTe\Tools;
use NFePHP\CTe\MakeCTe;
use NFePHP\Common\Certificate;
use NFePHP\CTe\Common\Standardize;

class GenerateCTe
{

    use MontaChave;
    private $config;
    private $tools;
    private $chave;

    public function __construct(SpedCteConfig $config, string $pathPFX = '')
    {
        $this->config = json_encode($config);
        $this->tools = new Tools(
            $this->config,
            Certificate::readPfx(
                file_get_contents($pathPFX),
                '123456'
            )
        );
        $this->tools->model('57');

    }
    public function authorize(array $data)
    {

        $cte = new MakeCTe();
        $dhEmi = date("Y-m-d\TH:i:sP");
        $numeroCTE = '127';

        static::$chave = static::montaChave(
            '43',
            date('y', strtotime($dhEmi)),
            date('m', strtotime($dhEmi)),
            $this->config['cnpj'],
            $this->tools->model(),
            '1',
            $numeroCTE,
            '1',
            '10'
        );

        $infCte = new stdClass();
        $infCte->Id = "";
        $infCte->versao = "3.00";
        $cte->taginfCTe($infCte);
        $cte->tagide($this->ide($data));
        $cte->tagtoma3($this->toma3($data));
        $cte->tagenderToma($this->enderToma($data));
        $cte->tagemit($this->emit($data));
        $cte->tagenderEmit($this->enderEmit($data));
        $cte->tagrem($this->rem($data));
        $cte->tagenderReme($this->enderReme($data));
        $cte->tagdest($this->dest($data));
        $cte->tagenderDest($this->enderDest($data));
        $cte->tagvPrest($this->vPrest($data));
        $cte->tagComp($this->comp($data));
        $cte->tagicms($this->icms($data));
        $cte->taginfCTeNorm();              // Grupo de informações do CT-e Normal e Substituto
        $cte->taginfCarga($this->infCarga($data));
        $cte->taginfQ($this->infQ($data));
        $cte->taginfNFe($this->infNFe($data));
        $cte->taginfModal($this->infModal($data));
        $cte->tagrodo($this->rodo($data));
        $cte->tagaereo($this->aereo($data));
        $cte->tagautXML($this->autXML($data));
        $cte->montaCTe();

        $filename = "xml/{$this->chave}-cte.xml";
        $xml = $cte->getXML();
        $xml = $this->tools->signCTe($xml);

        file_put_contents($filename, $xml);

        $this->sendCTe($xml);

    }

    private function sendCTe(string $xml)
    {
        $res = $this->tools->sefazEnviaCTe($xml);
        $stdCl = new Standardize($res);
        $std = $stdCl->toStd();

        if ($std->cStat != 100) {//103 - Lote recebido com Sucesso
            //processa erros
        }
    }

    private function ide(array $data): stdClass
    {
        $ide = new stdClass();
        $ide->cUF = $data['cUF'];
        $ide->cCT = $data['cCT'];
        $ide->CFOP = $data['CFOP'];
        $ide->natOp = $data['natOp'];
        $ide->forPag = $data['forPag'];
        $ide->mod = $data['mod'];
        $ide->serie = $data['serie'];
        $ide->nCT = $data['nCT'];
        $ide->dhEmi = $data['dhEmi'];
        $ide->tpImp = $data['tpImp'];
        $ide->tpEmis = $data['tpEmis'];
        $ide->cDV = substr($this->chave, -1);
        ;
        $ide->tpAmb = $data['tpAmb'];
        $ide->tpCTe = $data['tpCTe'];
        $ide->procEmi = $data['procEmi'];
        $ide->verProc = $data['verProc'];
        $ide->indGlobalizado = $data['indGlobalizado'];
        $ide->refCTE = $data['refCTE'];
        $ide->cMunEnv = $data['cMunEnv'];
        $ide->xMunEnv = $data['xMunEnv'];
        $ide->UFEnv = $data['UFEnv'];
        $ide->modal = $data['modal'];
        $ide->tpServ = $data['tpServ'];
        $ide->cMunIni = $data['cMunIni'];
        $ide->xMunIni = $data['xMunIni'];
        $ide->UFIni = $data['UFIni'];
        $ide->cMunFim = $data['cMunFim'];
        $ide->xMunFim = $data['xMunFim'];
        $ide->UFFim = $data['UFFim'];
        $ide->retira = $data['retira'];
        $ide->xDetRetira = $data['xDetRetira'];
        $ide->indIEToma = $data['indIEToma'];
        $ide->dhCont = $data['dhCont'];
        $ide->xJust = $data['xJust'];

        return $ide;
    }

    private function toma3(array $data): stdClass
    {
        $toma3 = new stdClass();
        $toma3->toma = $data['toma'];
        return $toma3;
    }

    private function enderToma(array $data): stdClass
    {
        $enderToma = new stdClass();
        $enderToma->xLgr = $data['xLgr'];
        $enderToma->nro = $data['nro'];
        $enderToma->xCpl = $data['xCpl'];
        $enderToma->xBairro = $data['xBairro'];
        $enderToma->cMun = $data['cMun'];
        $enderToma->xMun = $data['xMun'];
        $enderToma->CEP = $data['CEP'];
        $enderToma->UF = $data['UF'];
        $enderToma->cPais = $data['cPais'];
        $enderToma->xPais = $data['xPais'];

        return $enderToma;
    }

    private function emit(array $data): stdClass
    {

        $emit = new stdClass();
        $emit->CNPJ = $data['CNPJ'];
        $emit->IE = $data['IE'];
        $emit->IEST = $data['IEST'];
        $emit->xNome = $data['xNome'];
        $emit->xFant = $data['xFant'];

        return $emit;
    }

    private function enderEmit(array $data): stdClass
    {
        $enderEmit = new stdClass();
        $enderEmit->xLgr = $data['xLgr'];
        $enderEmit->nro = $data['nro'];
        $enderEmit->xCpl = $data['xCpl'];
        $enderEmit->xBairro = $data['xBairro'];
        $enderEmit->cMun = $data['cMun'];
        $enderEmit->xMun = $data['xMun'];
        $enderEmit->CEP = $data['CEP'];
        $enderEmit->UF = $data['UF'];
        $enderEmit->fone = $data['fone'];
        return $enderEmit;
    }

    private function rem(array $data): stdClass
    {
        $rem = new stdClass();
        $rem->CNPJ = $data['CNPJ'];
        $rem->CPF = $data['CPF'];
        $rem->IE = $data['IE'];
        $rem->xNome = $data['xNome'];
        $rem->xFant = $data['xFant'];
        $rem->fone = $data['fone'];
        $rem->email = $data['email'];
        return $rem;
    }

    private function enderReme(array $data): stdClass
    {
        $enderReme = new stdClass();
        $enderReme->xLgr = $data['xLgr'];
        $enderReme->nro = $data['nro'];
        $enderReme->xCpl = $data['xCpl'];
        $enderReme->xBairro = $data['xBairro'];
        $enderReme->cMun = $data['cMun'];
        $enderReme->xMun = $data['xMun'];
        $enderReme->CEP = $data['CEP'];
        $enderReme->UF = $data['UF'];
        $enderReme->cPais = $data['cPais'];
        $enderReme->xPais = $data['xPais'];
        return $enderReme;
    }

    private function dest(array $data): stdClass
    {
        $dest = new stdClass();
        $dest->CNPJ = $data['CNPJ'];
        $dest->CPF = $data['CPF'];
        $dest->IE = $data['IE'];
        $dest->xNome = $data['xNome'];
        $dest->fone = $data['fone'];
        $dest->ISUF = $data['ISUF'];
        $dest->email = $data['email'];
        return $dest;
    }

    private function enderDest(array $data): stdClass
    {
        $enderDest = new stdClass();
        $enderDest->xLgr = $data['xLgr'];
        $enderDest->nro = $data['nro'];
        $enderDest->xCpl = $data['xCpl'];
        $enderDest->xBairro = $data['xBairro'];
        $enderDest->cMun = $data['cMun'];
        $enderDest->xMun = $data['xFxMunant'];
        $enderDest->CEP = $data['CEP'];
        $enderDest->UF = $data['UF'];
        $enderDest->cPais = $data['cPais'];
        $enderDest->xPais = $data['xPais'];
        return $enderDest;
    }

    private function vPrest(array $data): stdClass
    {
        $vPrest = new stdClass();
        $vPrest->vTPrest = 3334.32; // Valor total da prestacao do servico
        $vPrest->vRec = 3334.32;      // Valor a receber
        return $vPrest;
    }

    private function comp(array $data): stdClass
    {
        $comp = new stdClass();
        $comp->xNome = 'FRETE VALOR'; // Nome do componente
        $comp->vComp = '3334.32';  // Valor do componente
        return $comp;
    }

    private function icms(array $data): stdClass
    {
        $icms = new stdClass();
        $icms->cst = '00'; // 00 - Tributacao normal ICMS
        $icms->pRedBC = ''; // Percentual de redução da BC (3 inteiros e 2 decimais)
        $icms->vBC = 3334.32; // Valor da BC do ICMS
        $icms->pICMS = 12; // Alícota do ICMS
        $icms->vICMS = 400.12; // Valor do ICMS
        $icms->vBCSTRet = ''; // Valor da BC do ICMS ST retido
        $icms->vICMSSTRet = ''; // Valor do ICMS ST retido
        $icms->pICMSSTRet = ''; // Alíquota do ICMS
        $icms->vCred = ''; // Valor do Crédito Outorgado/Presumido
        $icms->vTotTrib = 754.38; // Valor de tributos federais; estaduais e municipais
        $icms->outraUF = false;    // ICMS devido à UF de origem da prestação; quando diferente da UF do emitente
        $icms->vICMSUFIni = 0;
        $icms->vICMSUFFim = 0;
        $icms->infAdFisco = 'Informações ao fisco';
        return $icms;
    }

    private function infCarga(array $data): stdClass
    {
        $infCarga = new stdClass();
        $infCarga->vCarga = 130333.31; // Valor total da carga
        $infCarga->proPred = 'TUBOS PLASTICOS'; // Produto predominante
        $infCarga->xOutCat = 6.00; // Outras caracteristicas da carga
        $infCarga->vCargaAverb = 1.99;
        return $infCarga;
    }

    private function infQ(array $data): stdClass
    {
        $infQ = new stdClass();
        $infQ->cUnid = '01'; // Código da Unidade de Medida: ( 00-M3; 01-KG; 02-TON; 03-UNIDADE; 04-LITROS; 05-MMBTU
        $infQ->tpMed = 'ESTRADO'; // Tipo de Medida
        // ( PESO BRUTO; PESO DECLARADO; PESO CUBADO; PESO AFORADO; PESO AFERIDO; LITRAGEM; CAIXAS e etc)
        $infQ->qCarga = 18145.0000;  // Quantidade (15 posições; sendo 11 inteiras e 4 decimais.)
        return $infQ;
    }

    private function infNFe(array $data): stdClass
    {
        $infNFe = new stdClass();
        $infNFe->chave = '43160472202112000136550000000010571048440722'; // Chave de acesso da NF-e
        $infNFe->PIN = ''; // PIN SUFRAMA
        $infNFe->dPrev = '2016-10-30';                                       // Data prevista de entrega
        return $infNFe;
    }

    private function infModal(array $data): stdClass
    {
        $infModal = new stdClass();
        $infModal->versaoModal = '3.00';
        return $infModal;
    }

    private function rodo(array $data): stdClass
    {
        $rodo = new stdClass();
        $rodo->RNTRC = '00739357';
        return $rodo;
    }

    private function aereo(array $data): stdClass
    {
        $aereo = new stdClass();
        $aereo->nMinu = '123'; // Número Minuta
        $aereo->nOCA = ''; // Número Operacional do Conhecimento Aéreo
        $aereo->dPrevAereo = date('Y-m-d');
        $aereo->natCarga_xDime = ''; // Dimensões 1234x1234x1234 em cm
        $aereo->natCarga_cInfManu = []; // Informação de manuseio, com dois dígitos, pode ter mais de uma ocorrência.
        $aereo->tarifa_CL = 'G'; // M - Tarifa Mínima / G - Tarifa Geral / E - Tarifa Específica
        $aereo->tarifa_cTar = ''; // código da tarifa, deverão ser incluídos os códigos de três digítos correspondentes à tarifa
        $aereo->tarifa_vTar = 100.00; // valor da tarifa. 15 posições, sendo 13 inteiras e 2 decimais. Valor da tarifa por kg quando for o caso
        return $aereo;
    }

    private function autXML(array $data): stdClass
    {
        $autXML = new stdClass();
        $autXML->CPF = '59195248471'; // CPF ou CNPJ dos autorizados para download do XML
        return $autXML;
    }
}
