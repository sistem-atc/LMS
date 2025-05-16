<?php

namespace App\Services\Towns\Systems\Abaco\Filament;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use App\Interfaces\ExcludeSelectInterface;

class ComposeForm implements ExcludeSelectInterface
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('idLote'),
                TextInput::make('numeroLote'),
                TextInput::make('cnpj'),
                TextInput::make('inscricaoMunicipal'),
                TextInput::make('infoId'),
                TextInput::make('numeroRps'),
                TextInput::make('serieRps'),
                TextInput::make('tipoRps'),
                TextInput::make('dataEmissao'),
                TextInput::make('naturezaOperacao'),
                TextInput::make('regimeTributacao'),
                TextInput::make('optanteSimplesNacional'),
                TextInput::make('incentivadorCultural'),
                TextInput::make('status'),
                TextInput::make('valorServicos'),
                TextInput::make('valorDeducoes'),
                TextInput::make('valorPis'),
                TextInput::make('valorCofins'),
                TextInput::make('valorInss'),
                TextInput::make('valorIr'),
                TextInput::make('valorCsll'),
                TextInput::make('issRetido'),
                TextInput::make('valorIss'),
                TextInput::make('valorIssRetido'),
                TextInput::make('valorOutraRetencoes'),
                TextInput::make('baseCalculo'),
                TextInput::make('aliquota'),
                TextInput::make('valorLiquidoNfse'),
                TextInput::make('descontoIncodicionado'),
                TextInput::make('descontoCodicionado'),
                TextInput::make('itemListaServico'),
                TextInput::make('codigoCnae'),
                TextInput::make('codigoTributacao'),
                TextInput::make('discriminacao'),
                TextInput::make('prestador.cnpj'),
                TextInput::make('prestador.inscricaoMunicipal'),
                TextInput::make('tomador.cnpj'),
                TextInput::make('tomador.inscricaoMunicipal'),
                TextInput::make('tomador.razaoSocial'),
                TextInput::make('tomador.endereco'),
                TextInput::make('tomador.numero'),
                TextInput::make('tomador.complemento'),
                TextInput::make('tomador.bairro'),
                TextInput::make('tomador.codigoMunicipio'),
                TextInput::make('tomador.uf'),
                TextInput::make('tomador.cep'),
                TextInput::make('tomador.contato'),
                TextInput::make('tomador.email'),
            ]);
    }
}
