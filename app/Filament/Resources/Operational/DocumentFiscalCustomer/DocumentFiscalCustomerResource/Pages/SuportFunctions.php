<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use SimpleXMLElement;
use App\Models\CodeUf;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\DocumentFiscalCustomer;
use App\Services\Utils\ViaCep\Entities\ViaCep;
use App\Services\Utils\ViaCep\ViaCepService;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class SuportFunctions
{

    public static array $notescustomer = [];
    public static array $msg = [];
    public static array $datanotes = [];

    public static function ImportNotFis(array $data): Notification
    {

        $filePath = $data['attachment'];
        $file = fopen(Storage::path($filePath), 'r');
        $header = fgetcsv($file);
        $line = 0;

        while ($row = fgetcsv($file)) {
            //$ctes[] = array_combine($header, $row);
            $line++;
        }

        fclose($file);

        unlink(Storage::path($filePath));

        return Notification::make()
            ->success()
            ->title('NOTFIS Importado com Sucesso')
            ->body($line - 2 . ' notas foram importadas');
    }

    public static function ImportXml(array $data): Notification
    {

        foreach ($data['attachment'] as $xml) {

            if (!file_exists(Storage::path($xml))) {
                self::$msg[] = 'Erro ao abrir o XML: ' . $xml;
                goto nextfile;
            }

            $xmlString = file_get_contents(Storage::path($xml));
            $xml = new SimpleXMLElement($xmlString);
            $xmljson = json_encode($xml);
            $xmlarray = json_decode($xmljson, true);

            if (Customer::where('cpf_or_cnpj', '=', Arr::get($xmlarray, 'NFe.infNFe.emit.CNPJ'))->first() == null) {
                self::includeCustomer($xmlarray, 'emit');
            }

            if (Customer::where('cpf_or_cnpj', '=', Arr::get($xmlarray, 'NFe.infNFe.dest.CNPJ'))->first() == null) {
                self::includeCustomer($xmlarray, 'dest');
            }

            if (DocumentFiscalCustomer::where('chNFe', '=', Arr::get($xmlarray, 'protNFe.infProt.chNFe'))->first() != null) {
                self::$msg[] = 'XML já consta na base: ' . Arr::get($xmlarray, 'protNFe.infProt.chNFe');
                goto nextfile;
            }

            self::StoreDocumentFiscalCustomer($xmlarray);

            self::$msg[] = 'Importado XML Chave: ' . Arr::get($xmlarray, 'protNFe.infProt.chNFe');

            nextfile:

            Storage::delete($xml);
        };

        $mountnotify = Notification::make()
            ->info()
            ->title('Resultado da Importação')
            ->body(Str::markdown('XMLs importados, verifique os detalhes: <br>' . join('<br>', self::$msg)))
            ->persistent()
            ->send();

        return $mountnotify;
    }

    public static function StoreDocumentFiscalCustomer(array $data): void
    {

        $storeData = [
            'cUF_id' => CodeUf::where('code_uf', '=', Arr::get($data, 'NFe.infNFe.ide.cUF'))->first()->id,
            'mod' => Arr::get($data, 'NFe.infNFe.ide.mod'),
            'serie' => Arr::get($data, 'NFe.infNFe.ide.serie'),
            'nNF' => Arr::get($data, 'NFe.infNFe.ide.nNF'),
            'dEmi' => Arr::get($data, 'NFe.infNFe.ide.dhEmi'),
            'emit_customer_id' => Customer::where('cpf_or_cnpj', '=', Arr::get($data, 'NFe.infNFe.emit.CNPJ'))->first()->id,
            'sender_customer_id' => Customer::where('cpf_or_cnpj', '=', Arr::get($data, 'NFe.infNFe.emit.CNPJ'))->first()->id,
            'recipient_customer_id' => Customer::where('cpf_or_cnpj', '=', Arr::get($data, 'NFe.infNFe.dest.CNPJ'))->first()->id,
            'vBC' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vBC'),
            'vICMS' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vICMS'),
            'vBCST' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vBCST'),
            'vST' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vST'),
            'vProd' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vProd'),
            'vFrete' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vFrete'),
            'vSeg' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vSeg'),
            'vDesc' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vDesc'),
            'vIPI' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vIPI'),
            'vPIS' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vPIS'),
            'vCOFINS' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vCOFINS'),
            'vOutro' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vOutro'),
            'vNF' => Arr::get($data, 'NFe.infNFe.total.ICMSTot.vNF'),
            'modFrete' => Arr::get($data, 'NFe.infNFe.transp.modFrete'),
            'qVol' => Arr::get($data, 'NFe.infNFe.transp.qVol'),
            'pesoL' => Arr::get($data, 'NFe.infNFe.transp.pesoL'),
            'pesoB' => Arr::get($data, 'NFe.infNFe.transp.pesoB'),
            'infAdic' => Arr::get($data, 'NFe.infNFe.infAdic.infAdFisco'),
            'chNFe' => Arr::get($data, 'protNFe.infProt.chNFe'),
        ];

        DocumentFiscalCustomer::create($storeData);
    }

    private static function includeCustomer(array $xmlArray, string $key): void
    {

        $uppercase = ucfirst($key);
        $dataCep = ViaCepService::consultaCEP(Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.CEP"));

        if(Arr::get($xmlArray, "NFe.infNFe.{$key}.xFant")){
            $fantasyname = Arr::get($xmlArray, "NFe.infNFe.{$key}.xFant");
        } else {
            $fantasyname = Arr::get($xmlArray, "NFe.infNFe.{$key}.xNome");
        }

        Customer::create([
            'cpf_or_cnpj' => Arr::get($xmlArray, "NFe.infNFe.{$key}.CNPJ"),
            'company_name' => Arr::get($xmlArray, "NFe.infNFe.{$key}.xNome"),
            'type_person' => Arr::get($xmlArray, "NFe.infNFe.{$key}.CNPJ"),
            'fantasy_name' => $fantasyname,
            'postal_code' => Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.CEP"),
            'street' => $dataCep['logradouro'],
            'complement' => $dataCep['complemento'],
            'number' => Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.nro"),
            'district' => $dataCep['bairro'],
            'city' => $dataCep['localidade'],
            'state' => $dataCep['uf'],
            'ibge' => $dataCep['ibge'],
            'gia' => $dataCep['gia'],
            'ddd' => $dataCep['ddd'],
            'siafi' => $dataCep['siafi'],
            'phone_number' => Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.fone"),
            'state_registration' => Arr::get($xmlArray, "NFe.infNFe.{$key}.IE"),
            //VALIDAR DAQUI PARA BAIXO COMO PREENCHER
            'region' => 'SUDESTE',
            'nature_id' => 1,
            'vendor_id' => 1,
            'bank_id' => 1,
            'payment_term_id' => 1,
            'priority' => 0,
            'risc' => 'A',
            'group_customer_id' => 1,
            'type_person' => 'J',
        ]);
    }
}
