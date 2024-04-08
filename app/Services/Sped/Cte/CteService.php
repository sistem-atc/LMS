<?php

namespace App\Services\Sped\Cte;

use App\Models\Cte;
use App\Models\Bank;
use NFePHP\CTe\Tools;
use NFePHP\Common\Certificate;

class CteService
{

    public function baixarCte()
    {
        try{

            $nsuAtual = $this->getUltNsu(Bank::select('cnpj')->first());

            if (is_array($nsuAtual)){

                return $nsuAtual;
            }

            $arrayCte = $this->getCteSefaz($nsuAtual);

            if (!array_key_exists("erro", $arrayCte)){

                return json_encode($this->inserirCteBaixado($arrayCte));

            }
            else{

                return $arrayCte;
            }
        }catch (\Exception $e){

                return array("codigo"=> "001","erro"=> $e->getMessage());
            }
    }

    public function getUltNsu(){

        try{

            $nsuAtual = Cte::select("ultimo_nsu")->get()->toArray();

            if (count($nsuAtual) == 0){
                $insertNsu = Cte::create(["ultimo_nsu" => 0])->get()->toArray();

                if (count($insertNsu) > 0){

                    return $insertNsu[0]['ultimo_nsu'];
                }
                else{

                    throw new \Exception("Nao foi possivel inserir numero sequencial unico inicial");
                }

            }else{

                return $$nsuAtual[0]['ultimo_nsu'];

            }

        }catch (\Exception $e){

            return array('codigo'=> '002','erro'=> $e->getMessage());

        }
    }

    public function getCteSefaz($nsuAtual = 0){

        try{

            $content = file_get_contents(Bank::select('path_cert'));
            $this->tools = new Tools(Bank::class, Certificate::readPfx($content, Bank::select('password_cert')));

            //$contingencia = $this->tools->contingency->deactivate();
            //$this->tools->contingency->load($contingencia);
            $xml = $this->tools->sefazDistDFe($nsuAtual, 0);
            $array_response = array();

            $dom = new \DOMDocument;

            $dom->loadXML($xml);
            $docs = $dom->getElementsByTagName('docZip');

            $ultimoNsu = 0;

            foreach ($docs as $doc) {

                $ultimoNsu = $doc->getAttribute('NSU');
                $schema = $doc->getAttribute('schema');
                $content = gzdecode(base64_decode($doc->nodeValue));
                $array_response[] = array('schema' => $schema, 'aDoc' => $content, 'nsu'=> $ultimoNsu);

            }

            if (count($array_response) > 0) {

                return $array_response;

            }
            else {

                throw new \Exception($this->getRejeicao($dom));

            }

        }

        catch (\Exception $e) {

            return array('codigo' => '004', 'error'=> $e->getMessage());
        }
    }

    public function getRejeicao(\DOMDocument $dom) {

        try{

            $tagxMotivo = $dom->getElementsByTagName('xMotivo');
            $tagcStat = $dom->getElementsByTagName('cStat');

            $xMotivo = "";
            $cStat = "";
            $i = 0;

            foreach ($tagxMotivo as $v) {

                if ($i == 0){
                    $xMotivo = $v->nodeValue;
                }

                $i++;
            }

            $a = 0;

            foreach ($tagcStat as $v) {

                if ($a == 0){
                    $cStat = $v->nodeValue;
                }

                $a++;
            }

            return "(". $cStat .") " . $xMotivo;

        }

        catch (\Exception $e) {

            return 'Nao foi possivel identificar rejeição';
        }
    }

}
