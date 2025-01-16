<?php

namespace Database\Seeders;

use App\Services\Towns\Abaco\Abaco;
use App\Services\Towns\Betha\Betha;
use App\Services\Towns\DBSeller\DBSeller;
use App\Services\Towns\Desenvolve\Desenvolve;
use App\Services\Towns\SigIss\SigIss;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\Towns\WebIss\WebIss;
class CitySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('city_settings')->insert([

            [
                'city_name' => 'Manaus',
                'ibge'=> '1302603',
                'url_prod' => 'https://nfse-prd.manaus.am.gov.br/nfse/servlet/',
                'url_homolog' => 'https://nfsev-prd.manaus.am.gov.br/nfsev/servlet/hlogin',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Abaco::class
            ],

            [
                'city_name' => 'Criciuma',
                'ibge'=> '4204608',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Joaçaba',
                'ibge'=> '4209003',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Jandaia do Sul',
                'ibge'=> '4112108',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Lages',
                'ibge'=> '4209300',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Rio Verde',
                'ibge'=> '5218805',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Florianópolis',
                'ibge'=> '4205407',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Ouro Branco',
                'ibge'=> '3145901',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Sant Ana do Livramento',
                'ibge'=> '4317103',
                'url_prod' => 'https://nfe.sdolivramento.com.br/webservice/index/producao',
                'url_homolog' => 'https://nfe.sdolivramento.com.br/webservice/index/homologacao',
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => DBSeller::class
            ],

            [
                'city_name' => 'Ananindeua',
                'ibge'=> '1500800',
                'url_prod' => 'https://ananindeua-pa.desenvolvecidade.com.br/nfsd/IntegracaoNfsd',
                'url_homolog' => 'https://hml-01-ananindeua-pa.desenvolvecidade.com.br/nfsd/IntegracaoNfsd?wsdl',
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => Desenvolve::class
            ],

            [
                'city_name' => 'Governador Valadares',
                'ibge'=> '3127701',
                'url_prod' => 'https://valadares.sigiss.com.br/valadares/ws/sigiss_ws.php',
                'url_homolog' => 'https://testevaladares.sigiss.com.br/testevaladares/ws/sigiss_ws.php',
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => SigIss::class
            ],

            [
                'city_name' => 'Marilia',
                'ibge'=> '3524005',
                'url_prod' => 'https://marilia.sigiss.com.br:443/marilia/ws/sigiss_ws.php',
                'url_homolog' => 'https://testemarilia.sigiss.com.br:443/testemarilia/ws/sigiss_ws.php',
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => SigIss::class
            ],

            [
                'city_name' => 'Açailândia',
                'ibge'=> '2100055',
                'url_prod' => 'https://acailandia.sigiss.com.br:443/acailandia/ws/sigiss_ws.php',
                'url_homolog' => null,
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => SigIss::class
            ],

            [
                'city_name' => 'Barueri',
                'ibge'=> '3505708',
                'url_prod' => 'https://www.barueri.sp.gov.br/nfeservice/wsrps.asmx',
                'url_homolog' => 'https://testeeiss.barueri.sp.gov.br/nfeservice/wsrps.asmx',
                'headerversion' => null,
                'namespace' => '',
                'version' => null,
                'class_path' => null
            ],

            [
                'city_name' => 'Varginha',
                'ibge'=> '3170701',
                'url_prod' => 'https://e-gov.betha.com.br/e-nota-contribuinte-ws/nfseWS',
                'url_homolog' => 'http://e-gov.betha.com.br/e-nota-contribuinte-test-ws/nfseWS',
                'headerversion' => '2.02',
                'namespace' => '',
                'version' => null,
                'class_path' => Betha::class
            ],

            [
                'city_name' => 'Aracaju',
                'ibge'=> '2800308',
                'url_prod' => 'https://aracajuse.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Araguaina',
                'ibge'=> '1702100',
                'url_prod' => 'https://araguainato.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Bagé',
                'ibge'=> '4301602',
                'url_prod' => 'https://bagers.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Divinópolis',
                'ibge'=> '3122306',
                'url_prod' => 'https://ws.nfe-cidades.com.br/ws/div',
                'url_homolog' => '',
                'headerversion' => '2.01',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Gurupi',
                'ibge'=> '1709500',
                'url_prod' => 'https://gurupito.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Itabuna',
                'ibge'=> '2905700',
                'url_prod' => 'https://itabunaba.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Palmas',
                'ibge'=> '1721000',
                'url_prod' => 'https://palmasto.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Mathias Barbosa',
                'ibge'=> '3140803',
                'url_prod' => 'http://matiasbarbosamg.nfse-futurize.com.br/webservice/prod',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'version' => null,
                'class_path' => WebIss::class
            ],

            [
                'city_name' => 'Feira de Santana',
                'ibge'=> '2910800',
                'url_prod' => 'https://feiradesantanaba.webiss.com.br/ws/nfse.asmx',
                'url_homolog' => '',
                'headerversion' => '2.02',
                'namespace' => 'http://www.w3.org/2003/05/soap-envelope',
                'version' => null,
                'class_path' => WebIss::class
            ],
        ]);

    }
}
