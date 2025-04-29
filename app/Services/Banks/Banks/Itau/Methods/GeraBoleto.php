<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait GeraBoleto
{

    private string $endPoint;

    public function gerar(array $data): array
    {
        $this->endPoint = '/boletos';

        $message = json_encode(
            [
                'data' => [
                    'beneficiario' => [
                        'id_beneficiario' => parent::$id_beneficiario,
                    ],
                    'dado_boleto' => [
                        'pagador' => [
                            'pessoa' => [
                                'tipo_pessoa' => [
                                    'codigo_tipo_pessoa' => $data['customer']['tipo_pessoa'],
                                    'numero_cadastro_nacional_pessoa_juridica' => $data['customer']['cnpj'],
                                ],
                                'nome_pessoa' => $data['customer']['razao_social'],
                                'nome_fantasia' => $data['customer']['nome_fantasia'],
                            ],
                            'endereco' => [
                                'nome_logradouro' => $data['customer']['street'] . $data['customer']['number'],
                                'nome_bairro' => $data['customer']['bairro'],
                                'nome_cidade' => $data['customer']['cidade'],
                                'sigla_UF' => $data['customer']['uf'],
                                'numero_CEP' => $data['customer']['cep'],
                            ],
                        ],
                        'codigo_tipo_vencimento' => 3,
                        'valor_total_titulo' => $data['valor_total'],
                        'codigo_especie' => '01',
                        'codigo_aceite' => 'N',
                        'lista_mensagem_cobranca' => [
                            ['mensagem' => '{{MENSAGEM1}}'],
                            ['mensagem' => '{{MENSAGEM2}}'],
                            ['mensagem' => '{{MENSAGEM3}}'],
                        ],
                        'desconto_expresso' => 'false',
                        'descricao_instrumento_cobranca' => 'boleto',
                        'forma_envio' => 'impressao',
                        'tipo_boleto' => 'a vista',
                        'codigo_carteira' => parent::$carteira,
                        'dados_individuais_boleto' => [
                            [
                                'data_vencimento' => $data['vencimento'],
                                'valor_titulo' => $data['valor_total'],
                                'texto_uso_beneficiario' => $data['numero'],
                                'data_limite_pagamento' => '{{DATA_LIMITE_PAGAMETNO}}',
                                'numero_nosso_numero' => $data['nosso_numero'],
                                'texto_seu_numero' => '{{NUMERO_FATURA}}',
                                'lista_mensagens_cobranca' => [
                                    ['mensagem' => '{{MENSAGEM4}}'],
                                    ['mensagem' => '{{MENSAGEM5}}'],
                                    ['mensagem' => '{{MENSAGEM6}}'],
                                ],
                            ],
                        ],
                        'texto_seu_numero' => '{{NUMERO_FATURA}}',
                    ],
                    'etapa_processo_boleto' => 'validacao',
                    'codigo_operador' => parent::$id_beneficiario,
                ],
            ]
        );

        return $this->pendingRequest->path($this->endPoint, $message);

    }

}
