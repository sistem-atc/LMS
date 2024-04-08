<?php

namespace App\Services\Banks\Itau\Endpoints;
use App\Services\Banks\Itau\Concerns\ItauClient;

class GetBoletosItau
{

    use ItauClient;
    public function Registrar_Boletos(): array
    {

        $body = [
            'id_boleto',
            'etapa_processo_boleto',
            'codigo_canal_operacao',
            'beneficiario' => [
                'id_beneficiario',
                'nome_cobranca',
                'tipo_pessoa' => [
                    'codigo_tipo_pessoa',
                    'numero_cadastro_pessoa_fisica',
                    'numero_cadastro_nacional_pessoa_juridica'
                ],
                'endereco' => [
                    'nome_logradouro',
                    'nome_bairro',
                    'nome_cidade',
                    'sigla_UF',
                    'numero_CEP'
                ],
            ],
            'dado_boleto' => [
                'descricao_instrumento_cobranca',
                'tipo_boleto',
                'forma_envio',
                'quantidade_parcelas',
                'protesto' => [
                    'codigo_tipo_protesto',
                    'quantidade_dias_protesto',
                    'protesto_falimentar'
                ],
                'negativacao' => [
                    'codigo_tipo_negativacao',
                    'quantidade_dias_negativacao'
                ],
                'instrucao_cobranca' => [[
                    'codigo_instrucao_cobranca' => '2',
                    'quantidade_dias_instrucao_cobranca' => 2,
                    'dia_util' => true
                ],[
                    'codigo_instrucao_cobranca' => '2',
                    'quantidade_dias_instrucao_cobranca' => 2,
                    'dia_util' => true
                ],[
                    'codigo_instrucao_cobranca' => '2',
                    'quantidade_dias_instrucao_cobranca' => 2,
                    'dia_util' => true
                ]],
                'pagador' => [
                    'id_pagador',
                    'pessoa' => [
                        'nome_pessoa',
                        'nome_fantasia',
                        'tipo_pessoa' => [
                            'codigo_tipo_pessoa',
                            'numero_cadastro_pessoa_fisica',
                            'numero_cadastro_nacional_pessoa_juridica'
                        ]
                    ],
                    'endereco' => [
                        'nome_logradouro',
                        'nome_bairro',
                        'nome_cidade',
                        'sigla_UF',
                        'numero_CEP',
                        'texto_endereco_email',
                        'numero_ddd',
                        'numero_telefone',
                        'data_hora_inclusao_alteracao'
                    ],
                ],
                'sacador_avalista' => [
                    'pessoa' => [
                        'nome_pessoa',
                        'nome_fantasia',
                        'tipo_pessoa' => [
                            'codigo_tipo_pessoa',
                            'numero_cadastro_pessoa_fisica',
                            'numero_cadastro_nacional_pessoa_juridica'
                        ],
                        'endereco' => [
                            'nome_logradouro',
                            'nome_bairro',
                            'nome_cidade',
                            'sigla_UF',
                            'numero_CEP'
                        ],
                        'exclusao_sacador_avalista'
                    ],
                ],
                'codigo_carteira',
                'codigo_tipo_vencimento',
                'valor_total_titulo',
                'dados_individuais_boleto' => [[
                    'id_boleto_individual',
                    'status_boleto',
                    'situacao_geral_boleto',
                    'status_vencimento',
                    'mensagem_status_retorno',
                    'numero_nosso_numero',
                    'dac_titulo',
                    'data_vencimento',
                    'valor_titulo',
                    'texto_seu_numero',
                    'codigo_barras',
                    'numero_linha_digitavel',
                    'data_limite_pagamento',
                    'mensagens_cobranca' => [[
                        'mensagem'
                    ]],
                    'texto_uso_beneficiario'
                ]],
                'codigo_especie',
                'descricao_especie',
                'codigo_aceite',
                'data_emissao',
                'pagamento_parcial',
                'quantidade_maximo_parcial',
                'valor_abatimento',
                'juros' => [
                    'codigo_tipo_juros',
                    'quantidade_dias_juros',
                    'valor_juros',
                    'percentual_juros',
                    'data_juros'
                ],
                'multa' => [
                    'codigo_tipo_multa',
                    'quantidade_dias_multa',
                    'valor_multa',
                    'percentual_multa'
                ],
                'desconto' => [
                    'codigo_tipo_desconto',
                    'descontos' => [[
                        'quantidade_dias_desconto',
                        'valor_desconto',
                        'percentual_desconto'
                    ]],
                    'codigo',
                    'mensagem',
                    'campos' => [[
                        'campo',
                        'mensagem',
                        'valor'
                    ]]
                ],
                'mensagens_cobranca' => [
                    [
                        'mensagem'
                ]],
                'recebimento_divergente' => [
                    'codigo_tipo_autorizacao',
                    'valor_minimo',
                    'percentual_minimo',
                    'valor_maximo',
                    'percentual_maximo'
                ],
                'desconto_expresso',
                'texto_uso_beneficiario',
                'pagamentos_cobranca' => [[
                    'codigo_instituicao_financeira_pagamento',
                    'codigo_identificador_sistema_pagamento_brasileiro',
                    'numero_agencia_recebedora',
                    'codigo_canal_pagamento_boleto_cobranca',
                    'codigo_meio_pagamento_boleto_cobranca',
                    'valor_pago_total_cobranca',
                    'valor_pago_desconto_cobranca',
                    'valor_pago_multa_cobranca',
                    'valor_pago_juro_cobranca',
                    'valor_pago_abatimento_cobranca',
                    'valor_pagamento_imposto_sobre_operacao_financeira',
                    'data_hora_inclusao_pagamento',
                    'data_inclusao_pagamento',
                    'descricao_meio_pagamento',
                    'descricao_canal_pagamento'
                ]],
                'historico' => [[
                    'data',
                    'operacao',
                    'conteudo_anterior',
                    'conteudo_atual',
                    'motivo',
                    'comandado_por',
                    'detalhe' => [[
                        'descricao',
                        'conteudo_anterior',
                        'conteudo_atual'
                    ]]
                ]],
                'baixa' => [
                    'codigo',
                    'mensagem',
                    'campos' => [[
                        'campo',
                        'mensagem',
                        'valor'
                    ]],
                    'codigo_motivo_boleto_cobranca_baixado',
                    'indicador_dia_util_baixa',
                    'data_hora_inclusao_alteracao_baixa',
                    'codigo_usuario_inclusao_alteracao',
                    'data_inclusao_alteracao_baixa'
                ],
            ],
            'acoes_permitidas' => [
                'emitir_segunda_via',
                'comandar_instrucao_alterar_dados_cobranca'
            ],
        ];

        return BaseEndpoint::post('/boletos', $body);

    }

    public function Consulta_Boletos(): array
    {

        $body = [
            'id_beneficiario' =>
                BaseEndpoint::$databank->agencia .
                str_pad(BaseEndpoint::$databank->conta, 7, 0, STR_PAD_LEFT) .
                BaseEndpoint::$databank->dv_conta,
            'codigo_carteira' => '109',
            'nosso_numero' => '000000095',
            'data_inclusao' => '2023-12-12',
            'view' => 'specific'
        ];

        return BaseEndpoint::get('/boletos', $body);
    }

    public function Enviar_Abatimento(int $Id_Boleto): array
    {
        $body = [
            'valor_abatimento' => '100.00'
        ];

        return BaseEndpoint::patch('boletos/' . $Id_Boleto . '/abatimento', $body);
    }

    public function Baixa_Boleto(int $Id_Boleto): array
    {
        return BaseEndpoint::patch('boletos/' . $Id_Boleto . '/baixa');
    }
}
