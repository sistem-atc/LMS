<?php

namespace App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use App\Models\CodeUf;
use App\Models\Customer;
use App\Models\DocumentFiscalCustomer;
use App\Services\ConsultaCep\ConsultaCep;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleXMLElement;

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
                if (Customer::where('cpf_or_cnpj', '=', Arr::get($xmlarray, 'NFe.infNFe.emit.CNPJ'))->first() == null) {
                    self::$msg[] = 'Cliente não Cadastrado: ' . Arr::get($xmlarray, 'NFe.infNFe.emit.CNPJ');
                    goto nextfile;
                }
            }

            if (Customer::where('cpf_or_cnpj', '=', Arr::get($xmlarray, 'NFe.infNFe.dest.CNPJ'))->first() == null) {
                self::includeCustomer($xmlarray, 'dest');
                if (Customer::where('cpf_or_cnpj', '=', Arr::get($xmlarray, 'NFe.infNFe.emit.CNPJ'))->first() == null) {
                    self::$msg[] = 'Cliente não Cadastrado: ' . Arr::get($xmlarray, 'NFe.infNFe.emit.CNPJ');
                    goto nextfile;
                }
            }

            if (DocumentFiscalCustomer::where('chNFe', '=', Arr::get($xmlarray, 'protNFe.infProt.chNFe'))->first() != null) {
                self::$msg[] = 'XML já consta na base: ' . Arr::get($xmlarray, 'protNFe.infProt.chNFe');
                goto nextfile;
            }

            self::StoreDocumentFiscalCustomer($xmlarray, Storage::path($xml));

            self::$msg[] = 'Importado XML Chave: ' . Arr::get($xmlarray, 'protNFe.infProt.chNFe');

            nextfile:

        }

        $mountnotify = Notification::make()
            ->info()
            ->title('Resultado da Importação')
            ->body(Str::markdown('XMLs importados, verifique os detalhes: <br>' . implode('<br>', self::$msg)))
            ->persistent()
            ->send();

        return $mountnotify;
    }

    public static function StoreDocumentFiscalCustomer(array $data, string $pathxml): void
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
            'qVol' => Arr::get($data, 'NFe.infNFe.transp.vol.qVol'),
            'pesoL' => Arr::get($data, 'NFe.infNFe.transp.vol.pesoL'),
            'pesoB' => Arr::get($data, 'NFe.infNFe.transp.vol.pesoB'),
            'infAdic' => Arr::get($data, 'NFe.infNFe.infAdic.infAdFisco'),
            'chNFe' => Arr::get($data, 'protNFe.infProt.chNFe'),
            'xml' => $pathxml,
        ];

        DocumentFiscalCustomer::create($storeData);
    }

    private static function includeCustomer(array $xmlArray, string $key): void
    {

        $uppercase = ucfirst($key);
        $dataCep = ConsultaCep::consultaCEP(Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.CEP"));

        if (!isset($dataCep->error)) {

            $fantasyname = Arr::get($xmlArray, "NFe.infNFe.{$key}.xFant") ? Arr::get($xmlArray, "NFe.infNFe.{$key}.xFant") : Arr::get($xmlArray, "NFe.infNFe.{$key}.xNome");
            $typePerson = strlen(Arr::get($xmlArray, "NFe.infNFe.{$key}.CNPJ")) === 14 ? 'J' : 'F';

            Customer::create([
                'type_person' => $typePerson,
                'cpf_or_cnpj' => Arr::get($xmlArray, "NFe.infNFe.{$key}.CNPJ"),
                'company_name' => Arr::get($xmlArray, "NFe.infNFe.{$key}.xNome"),
                'type_person' => Arr::get($xmlArray, "NFe.infNFe.{$key}.CNPJ"),
                'fantasy_name' => $fantasyname,
                'postal_code' => Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.CEP"),
                'street' => $dataCep->logradouro,
                'complement' => $dataCep->complemento,
                'number' => Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.nro"),
                'district' => $dataCep->bairro,
                'city' => $dataCep->localidade,
                'state' => $dataCep->uf,
                'ibge' => $dataCep->ibge,
                'gia' => $dataCep->gia,
                'ddd' => $dataCep->ddd,
                'siafi' => $dataCep->siafi,
                'phone_number' => static::formatPhone(Arr::get($xmlArray, "NFe.infNFe.{$key}.ender{$uppercase}.fone")),
                'state_registration' => Arr::get($xmlArray, "NFe.infNFe.{$key}.IE"),
                'complete' => false,
            ]);
        }
    }

    protected static function formatPhone($phone)
    {
        $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
        $matches = [];
        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
        if ($matches) {
            return '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
        }

        return $phone;
    }
}
