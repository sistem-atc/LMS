<?php

namespace App\Services\SpedCte;

use App\Services\SpedCte\DTO\SpedCteConfig;
use stdClass;
use NFePHP\CTe\Tools;
use NFePHP\CTe\MakeCTe;
use NFePHP\Common\Certificate;
use NFePHP\CTe\Common\Standardize;

class GenerateCTe
{

    private $config;

    public function __construct(SpedCteConfig $config)
    {
        $this->config = $config;
    }
    public function generate(array $data)
    {

        $configJson = json_encode($this->config);
        $content = file_get_contents('fixtures/certificado.pfx');
        $tools = new Tools($configJson, Certificate::readPfx($content, '123456'));
        $tools->model('57');
        $cte = new MakeCTe();
        $dhEmi = date("Y-m-d\TH:i:sP");
        $numeroCTE = '127';
        $chave = $this->montaChave(
            cUF: '43',
            ano: date('y', strtotime($dhEmi)),
            mes: date('m', strtotime($dhEmi)),
            cnpj: $this->config->cnpj,
            mod: $tools->model(),
            serie: '1',
            numero: $numeroCTE,
            tpEmis: '1',
            codigo: '10'
        );

        $infCte = new stdClass();
        $infCte->Id = "";
        $infCte->versao = "3.00";
        $cte->taginfCTe($infCte);
        $cDV = substr($chave, -1);

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
        $ide->cDV = $cDV;
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

        $cte->tagide($ide);

        $toma3 = new stdClass();
        $toma3->toma = $data['toma'];
        $cte->tagtoma3($toma3);

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
        $cte->tagenderToma($enderToma);

        $emit = new stdClass();
        $emit->CNPJ = $data['CNPJ'];
        $emit->IE = $data['IE'];
        $emit->IEST = $data['IEST'];
        $emit->xNome = $data['xNome'];
        $emit->xFant = $data['xFant'];
        $cte->tagemit($emit);


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
        $cte->tagenderEmit($enderEmit);


        $rem = new stdClass();
        $rem->CNPJ = $data['CNPJ'];
        $rem->CPF = $data['CPF'];
        $rem->IE = $data['IE'];
        $rem->xNome = $data['xNome'];
        $rem->xFant = $data['xFant'];
        $rem->fone = $data['fone'];
        $rem->email = $data['email'];
        $cte->tagrem($rem);


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
        $cte->tagenderReme($enderReme);


        $dest = new stdClass();
        $dest->CNPJ = $data['CNPJ'];
        $dest->CPF = $data['CPF'];
        $dest->IE = $data['IE'];
        $dest->xNome = $data['xNome'];
        $dest->fone = $data['fone'];
        $dest->ISUF = $data['ISUF'];
        $dest->email = $data['email'];
        $cte->tagdest($dest);


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
        $cte->tagenderDest($enderDest);


        $vPrest = new stdClass();
        $vPrest->vTPrest = 3334.32; // Valor total da prestacao do servico
        $vPrest->vRec = 3334.32;      // Valor a receber
        $cte->tagvPrest($vPrest);


        $comp = new stdClass();
        $comp->xNome = 'FRETE VALOR'; // Nome do componente
        $comp->vComp = '3334.32';  // Valor do componente
        $cte->tagComp($comp);

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
        $cte->tagicms($icms);


        $cte->taginfCTeNorm();              // Grupo de informações do CT-e Normal e Substituto


        $infCarga = new stdClass();
        $infCarga->vCarga = 130333.31; // Valor total da carga
        $infCarga->proPred = 'TUBOS PLASTICOS'; // Produto predominante
        $infCarga->xOutCat = 6.00; // Outras caracteristicas da carga
        $infCarga->vCargaAverb = 1.99;
        $cte->taginfCarga($infCarga);

        $infQ = new stdClass();
        $infQ->cUnid = '01'; // Código da Unidade de Medida: ( 00-M3; 01-KG; 02-TON; 03-UNIDADE; 04-LITROS; 05-MMBTU
        $infQ->tpMed = 'ESTRADO'; // Tipo de Medida
        // ( PESO BRUTO; PESO DECLARADO; PESO CUBADO; PESO AFORADO; PESO AFERIDO; LITRAGEM; CAIXAS e etc)
        $infQ->qCarga = 18145.0000;  // Quantidade (15 posições; sendo 11 inteiras e 4 decimais.)
        $cte->taginfQ($infQ);
        $infQ->cUnid = '02'; // Código da Unidade de Medida: ( 00-M3; 01-KG; 02-TON; 03-UNIDADE; 04-LITROS; 05-MMBTU
        $infQ->tpMed = 'OUTROS'; // Tipo de Medida
        // ( PESO BRUTO; PESO DECLARADO; PESO CUBADO; PESO AFORADO; PESO AFERIDO; LITRAGEM; CAIXAS e etc)
        $infQ->qCarga = 31145.0000;  // Quantidade (15 posições; sendo 11 inteiras e 4 decimais.)
        $cte->taginfQ($infQ);

        $infNFe = new stdClass();
        $infNFe->chave = '43160472202112000136550000000010571048440722'; // Chave de acesso da NF-e
        $infNFe->PIN = ''; // PIN SUFRAMA
        $infNFe->dPrev = '2016-10-30';                                       // Data prevista de entrega
        $cte->taginfNFe($infNFe);

        $infModal = new stdClass();
        $infModal->versaoModal = '3.00';
        $cte->taginfModal($infModal);

        $rodo = new stdClass();
        $rodo->RNTRC = '00739357';
        $cte->tagrodo($rodo);

        $aereo = new stdClass();
        $aereo->nMinu = '123'; // Número Minuta
        $aereo->nOCA = ''; // Número Operacional do Conhecimento Aéreo
        $aereo->dPrevAereo = date('Y-m-d');
        $aereo->natCarga_xDime = ''; // Dimensões 1234x1234x1234 em cm
        $aereo->natCarga_cInfManu = []; // Informação de manuseio, com dois dígitos, pode ter mais de uma ocorrência.
        $aereo->tarifa_CL = 'G'; // M - Tarifa Mínima / G - Tarifa Geral / E - Tarifa Específica
        $aereo->tarifa_cTar = ''; // código da tarifa, deverão ser incluídos os códigos de três digítos correspondentes à tarifa
        $aereo->tarifa_vTar = 100.00; // valor da tarifa. 15 posições, sendo 13 inteiras e 2 decimais. Valor da tarifa por kg quando for o caso
        $cte->tagaereo($aereo);

        $autXML = new stdClass();
        $autXML->CPF = '59195248471'; // CPF ou CNPJ dos autorizados para download do XML
        $cte->tagautXML($autXML);

        //Monta CT-e
        $cte->montaCTe();
        $chave = $cte->chCTe;
        $filename = "xml/{$chave}-cte.xml";
        $xml = $cte->getXML();
        file_put_contents($filename, $xml);

        //Assina
        $xml = $tools->signCTe($xml);

        //Imprime XML na tela
        header('Content-type: text/xml; charset=UTF-8');
        print_r($xml);

        //Envia lote e autoriza
        $res = $tools->sefazEnviaCTe($xml);

        //Converte resposta
        $stdCl = new Standardize($res);
        //Output array
        $arr = $stdCl->toArray();
        //print_r($arr);
        //Output object
        $std = $stdCl->toStd();

        if ($std->cStat != 100) {//103 - Lote recebido com Sucesso
            //processa erros
            print_r($arr);
        }
        echo '<pre>';
        print_r($arr);

    }

    private function montaChave($cUF, $ano, $mes, $cnpj, $mod, $serie, $numero, $tpEmis, $codigo = '')
    {
        if ($codigo == '') {
            $codigo = $numero;
        }
        $forma = "%02d%02d%02d%s%02d%03d%09d%01d%08d";
        $chave = sprintf(
            $forma,
            $cUF,
            $ano,
            $mes,
            $cnpj,
            $mod,
            $serie,
            $numero,
            $tpEmis,
            $codigo
        );
        return $chave . $this->calculaDV($chave);
    }

    private function calculaDV($chave43)
    {
        $multiplicadores = array(2, 3, 4, 5, 6, 7, 8, 9);
        $iCount = 42;
        $somaPonderada = 0;
        while ($iCount >= 0) {
            for ($mCount = 0; $mCount < count($multiplicadores) && $iCount >= 0; $mCount++) {
                $num = (int) substr($chave43, $iCount, 1);
                $peso = (int) $multiplicadores[$mCount];
                $somaPonderada += $num * $peso;
                $iCount--;
            }
        }
        $resto = $somaPonderada % 11;
        if ($resto == '0' || $resto == '1') {
            $cDV = 0;
        } else {
            $cDV = 11 - $resto;
        }
        return (string) $cDV;
    }

}
