<?php

namespace App\Filament\Resources\Operational\LotResource\Pages;

use App\Models\Lot;
use App\Models\Branch;
use App\Models\Customer;
use Filament\Facades\Filament;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class SuportFunctions
{

    public static array $notescustomer = [];
    public static array $msg = [];
    public static array $msgErr = [];
    public static int $numberlot = 0;

    public static function ImportNotFis(array $data): Notification
    {

        $filePath = $data['attachment'];
        $idcustomer = $data['customer_id'];
        $emissiondate = $data['emission_date'];
        $duedate = $data['due_date'];

        $file = fopen(Storage::path($filePath), 'r');
        $header = fgetcsv($file);

        //Recuperar os dados do customer
        //validar os ctes's para ver se são todos do cliente recuperado e se estão pendentes de faturamento
        // autorizados, não cancelados e não excluidos (verificar mais regras)
        //gravar no banco da dados a fatura e no banco de ctes o numero do titulo
        //retornar o numero da fatura


        while ($row = fgetcsv($file)) {
            //$ctes[] = array_combine($header, $row);
        }

        fclose($file);

        unlink(Storage::path($filePath));

        return Notification::make()
                ->success()
                ->title('Lote Criado com Sucesso')
                ->body('NOTFIS Importado e Lote Criado.');

    }

    public static function ImportXml(array $data): Notification
    {

        /**
         * @todo Criar um lote novo para cada devedor de frete
         * Devedor é definido conforme o mod frete, CIF FOB (Validar demais casos)
         * Incluir as notas em cada lote
         */


        foreach ($data['attachment'] as $xml){
            if (file_exists(Storage::path($xml))) {
                $xmldom = simplexml_load_file(Storage::path($xml));
            }else {
                exit('Falha ao abrir o xml');
            };

            foreach($xmldom as $dom){
                $json = json_encode($dom);
                $notecustomer = array_values(json_decode($json, true));

                if(sizeof($notecustomer[0]) > 1)
                {
                    $emit = $notecustomer[0]['emit']['CNPJ'];
                    $datanotes = [
                        'cUF' => $notecustomer[0]['ide']['cUF'],
                        'cNF' => $notecustomer[0]['ide']['cNF'],
                        'mod' => $notecustomer[0]['ide']['mod'],
                        'serie' => $notecustomer[0]['ide']['serie'],
                        'nNF' => $notecustomer[0]['ide']['nNF'],
                        'dEmi' => $notecustomer[0]['ide']['dhEmi'],
                        'sender_customer' => $notecustomer[0]['emit']['CNPJ'],
                        'recipient_customer' => $notecustomer[0]['dest']['CNPJ'],
                        'vBC' => $notecustomer[0]['total']['ICMSTot']['vBC'],
                        'vICMS' => $notecustomer[0]['total']['ICMSTot']['vICMS'],
                        'vBCST' => $notecustomer[0]['total']['ICMSTot']['vBCST'],
                        'vST' => $notecustomer[0]['total']['ICMSTot']['vST'],
                        'vProd' => $notecustomer[0]['total']['ICMSTot']['vProd'],
                        'vFrete' => $notecustomer[0]['total']['ICMSTot']['vFrete'],
                        'vSeg' => $notecustomer[0]['total']['ICMSTot']['vSeg'],
                        'vDesc' => $notecustomer[0]['total']['ICMSTot']['vDesc'],
                        'vIPI' => $notecustomer[0]['total']['ICMSTot']['vIPI'],
                        'vPIS' => $notecustomer[0]['total']['ICMSTot']['vPIS'],
                        'vCOFINS' => $notecustomer[0]['total']['ICMSTot']['vCOFINS'],
                        'vOutro' => $notecustomer[0]['total']['ICMSTot']['vOutro'],
                        'vNF' => $notecustomer[0]['total']['ICMSTot']['vNF'],
                        'modFrete' => $notecustomer[0]['transp']['modFrete'],
                        'qVol' => $notecustomer[0]['transp']['vol']['qVol'],
                        'pesoL' => $notecustomer[0]['transp']['vol']['pesoL'],
                        'pesoB' => $notecustomer[0]['transp']['vol']['pesoB'],
                        'infAdic' => $notecustomer[0]['infAdic']['infCpl'],
                    ];
                }else{
                    $datanotes2 = [
                        'chNFe' => $notecustomer[1]['chNFe'],
                    ];
                }
            }

            if (DocumentFiscalCustomer::where($datanotes2['chNFe'], '=', 'chNFe'))
            {
                self::$msgErr[] = $xml;
            }
            else
            {
                if (self::$numberlot === 0){
                    $lot = new Lot;
                    $lot->origin_branch_id = Filament::auth()->user()->branch_logged_id;
                    $lot->status = 'Digitado';
                    $lot->save();
                    self::$numberlot = $lot->id;
                }

                $documentfiscalcustomer = new DocumentFiscalCustomer;
                $documentfiscalcustomer->lot_id = self::$numberlot;
                $documentfiscalcustomer->cUF = $datanotes['cUF'];
                $documentfiscalcustomer->cNF = $datanotes['cNF'];
                $documentfiscalcustomer->mod = $datanotes['mod'];
                $documentfiscalcustomer->serie = $datanotes['serie'];
                $documentfiscalcustomer->nNF = $datanotes['nNF'];
                $documentfiscalcustomer->dEmi = $datanotes['dEmi'];
                $documentfiscalcustomer->sender_customer_id = Customer::where('cpf_or_cnpj', '=', $datanotes['sender_customer'])->get()->first()->id;
                $documentfiscalcustomer->recipient_customer_id = Customer::where('cpf_or_cnpj', '=', $datanotes['recipient_customer'])->get()->first()->id;
                $documentfiscalcustomer->vBC = $datanotes['vBC'];
                $documentfiscalcustomer->vICMS = $datanotes['vICMS'];
                $documentfiscalcustomer->vBCST = $datanotes['vBCST'];
                $documentfiscalcustomer->vST = $datanotes['vST'];
                $documentfiscalcustomer->vProd = $datanotes['vProd'];
                $documentfiscalcustomer->vFrete = $datanotes['vFrete'];
                $documentfiscalcustomer->vSeg = $datanotes['vSeg'];
                $documentfiscalcustomer->vDesc = $datanotes['vDesc'];
                $documentfiscalcustomer->vIPI = $datanotes['vIPI'];
                $documentfiscalcustomer->vPIS = $datanotes['vPIS'];
                $documentfiscalcustomer->vCOFINS = $datanotes['vCOFINS'];
                $documentfiscalcustomer->vOutro = $datanotes['vOutro'];
                $documentfiscalcustomer->vNF = $datanotes['vNF'];
                $documentfiscalcustomer->modFrete = $datanotes['modFrete'];
                $documentfiscalcustomer->qVol = $datanotes['qVol'];
                $documentfiscalcustomer->pesoL = $datanotes['pesoL'];
                $documentfiscalcustomer->pesoB = $datanotes['pesoB'];
                $documentfiscalcustomer->infAdic = $datanotes['infAdic'];
                $documentfiscalcustomer->chNFe = $datanotes2['chNFe'];
                $documentfiscalcustomer->save();

                self::$msg[] = self::$numberlot;
            }
        }

        if (sizeof(self::$msgErr) > 0) {
            $mountnotify = Notification::make()
                            ->danger()
                            ->title('Lote Não Criado')
                            ->body('Xmls' . join(', ', self::$msgErr) . 'Não pertence ao cliente informado')
                            ->send();
        }else{
            $mountnotify = Notification::make()
                            ->success()
                            ->title('Lote Criado com Sucesso')
                            ->body('Lote Criado com Sucesso' . join(', ', self::$msg))
                            ->send();
        };

        return $mountnotify;

    }

    public static function generate(Model $record): Notification
    {

        if ($record->status == 'Digitado') {

            $docs = DocumentFiscalCustomer::where('lot_id','=', $record->id)->get();

            //Loop para agrupar notas
            //Popular CT-e com os dados necessarios

            $lot = new Lot;
            $lot->status = 'Calculado';
            $lot->save();

            return Notification::make()
                ->success()
                ->title('Lote Calculado com sucesso')
                ->body('CT-e Criado');

        } else {
            return Notification::make()
                    ->danger()
                    ->title('Lote Não pode Ser Calculado')
                    ->body('Lote com status diferente de Digitado não pode ser calculado.');
        }

    }

}
