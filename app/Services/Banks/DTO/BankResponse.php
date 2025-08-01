<?php

namespace App\Services\Banks\DTO;

final readonly class BankResponse
{

    public string $id_boleto;
    public string $etapa_processo_boleto;
    public string $codigo_canal_operacao;
    public string $id_beneficiario;
    public string $descricao_instrumento_cobranca;
    public string $forma_envio;
    public string $texto_endereco_email;
    public string $mensagem_email;
    public string $tipo_boleto;
    public string $codigo_carteira;
    public string $valor_total_titulo;
    public string $codigo_especie;
    public string $valor_abatimento;
    public string $data_emissao;
    public string $pagamento_parcial;
    public string $quantidade_maximo_parcial;
    public string $nome_pessoa;
    public string $codigo_tipo_pessoa;
    public string $numero_cadastro_pessoa_fisica;
    public string $nome_logradouro;
    public string $nome_bairro;
    public string $nome_cidade;
    public string $sigla_UF;
    public string $numero_CEP;
    public string $numero_nosso_numero;
    public string $data_vencimento;
    public string $valor_titulo;
    public string $texto_uso_beneficiario;
    public string $texto_seu_numero;
    public string $codigo_tipo_multa;
    public string $data_multa;
    public string $percentual_multa;
    public string $codigo_tipo_juros;
    public string $data_juros;
    public string $percentual_juros;
    public string $codigo_tipo_autorizacao;
    public string $codigo_instrucao_cobranca;
    public string $quantidade_dias_apos_vencimento;
    public string $dia_util;
    public string $protesto;
    public string $quantidade_dias_protesto;
    public string $desconto_expresso;
    public string $description;
    public string $nome_cobranca;
    public string $quantidade_parcelas;
    public string $descricao_especie;
    public string $codigo_aceite;
    public string $codigo_tipo_vencimento;
    public string $numero_agencia_recebedora;
    public string $data_inclusao_pagamento;
    public string $valor_pago_total_cobranca;
    public string $codigo_instituicao_financeira_pagamento;
    public string $descricao_canal_pagamento;
    public string $descricao_meio_pagamento;
    public string $data_inclusao_alteracao_baixa;
    public string $data_pagamento;
    public string $operacao;
    public string $comandado_por;
    public string $emitir_segunda_via;
    public string $comandar_instrucao_alterar_dados_cobranca;
    public string $page;
    public string $total_pages;
    public string $total_elements;
    public string $page_size;
    public string $links_first;
    public string $links_last;
    public string $links_previous;
    public string $links_next;
    public string $codigo;
    public string $mensagem;
    public string $campo;
    public string $campo_mensagem;
    public string $campo_valor;


    public function __construct(array $data)
    {
        $this->id_boleto = data_get($data, 'id_boleto');
        $this->etapa_processo_boleto = data_get($data, 'etapa_processo_boleto');
        $this->codigo_canal_operacao = data_get($data, 'codigo_canal_operacao');
        $this->id_beneficiario = data_get($data, 'id_beneficiario');
        $this->descricao_instrumento_cobranca = data_get($data, 'descricao_instrumento_cobranca');
        $this->forma_envio = data_get($data, 'forma_envio');
        $this->texto_endereco_email = data_get($data, 'texto_endereco_email');
        $this->mensagem_email = data_get($data, 'mensagem_email');
        $this->tipo_boleto = data_get($data, 'tipo_boleto');
        $this->codigo_carteira = data_get($data, 'codigo_carteira');
        $this->valor_total_titulo = data_get($data, 'valor_total_titulo');
        $this->codigo_especie = data_get($data, 'codigo_especie');
        $this->valor_abatimento = data_get($data, 'valor_abatimento');
        $this->data_emissao = data_get($data, 'data_emissao');
        $this->pagamento_parcial = data_get($data, 'pagamento_parcial');
        $this->quantidade_maximo_parcial = data_get($data, 'quantidade_maximo_parcial');
        $this->nome_pessoa = data_get($data, 'nome_pessoa');
        $this->codigo_tipo_pessoa = data_get($data, 'codigo_tipo_pessoa');
        $this->numero_cadastro_pessoa_fisica = data_get($data, 'numero_cadastro_pessoa_fisica');
        $this->nome_logradouro = data_get($data, 'nome_logradouro');
        $this->nome_bairro = data_get($data, 'nome_bairro');
        $this->nome_cidade = data_get($data, 'nome_cidade');
        $this->sigla_UF = data_get($data, 'sigla_UF');
        $this->numero_CEP = data_get($data, 'numero_CEP');
        $this->numero_nosso_numero = data_get($data, 'numero_nosso_numero');
        $this->data_vencimento = data_get($data, 'data_vencimento');
        $this->valor_titulo = data_get($data, 'valor_titulo');
        $this->texto_uso_beneficiario = data_get($data, 'texto_uso_beneficiario');
        $this->texto_seu_numero = data_get($data, 'texto_seu_numero');
        $this->codigo_tipo_multa = data_get($data, 'codigo_tipo_multa');
        $this->data_multa = data_get($data, 'data_multa');
        $this->percentual_multa = data_get($data, 'percentual_multa');
        $this->codigo_tipo_juros = data_get($data, 'codigo_tipo_juros');
        $this->data_juros = data_get($data, 'data_juros');
        $this->percentual_juros = data_get($data, 'percentual_juros');
        $this->codigo_tipo_autorizacao = data_get($data, 'codigo_tipo_autorizacao');
        $this->codigo_instrucao_cobranca = data_get($data, 'codigo_instrucao_cobranca');
        $this->quantidade_dias_apos_vencimento = data_get($data, 'quantidade_dias_apos_vencimento');
        $this->dia_util = data_get($data, 'dia_util');
        $this->protesto = data_get($data, 'protesto');
        $this->quantidade_dias_protesto = data_get($data, 'quantidade_dias_protesto');
        $this->desconto_expresso = data_get($data, 'desconto_expresso');
        $this->description = data_get($data, 'description');
        $this->nome_cobranca = data_get($data, 'nome_cobranca');
        $this->quantidade_parcelas = data_get($data, 'quantidade_parcelas');
        $this->descricao_especie = data_get($data, 'descricao_especie');
        $this->codigo_aceite = data_get($data, 'codigo_aceite');
        $this->codigo_tipo_vencimento = data_get($data, 'codigo_tipo_vencimento');
        $this->numero_agencia_recebedora = data_get($data, 'numero_agencia_recebedora');
        $this->data_inclusao_pagamento = data_get($data, 'data_inclusao_pagamento');
        $this->valor_pago_total_cobranca = data_get($data, 'valor_pago_total_cobranca');
        $this->codigo_instituicao_financeira_pagamento = data_get($data, 'codigo_instituicao_financeira_pagamento');
        $this->descricao_canal_pagamento = data_get($data, 'descricao_canal_pagamento');
        $this->descricao_meio_pagamento = data_get($data, 'descricao_meio_pagamento');
        $this->data_inclusao_alteracao_baixa = data_get($data, 'data_inclusao_alteracao_baixa');
        $this->data_pagamento = data_get($data, 'data');
        $this->operacao = data_get($data, 'operacao');
        $this->comandado_por = data_get($data, 'comandado_por');
        $this->emitir_segunda_via = data_get($data, 'emitir_segunda_via');
        $this->comandar_instrucao_alterar_dados_cobranca = data_get($data, 'comandar_instrucao_alterar_dados_cobranca');
        $this->page = data_get($data, 'page');
        $this->total_pages = data_get($data, 'total_pages');
        $this->total_elements = data_get($data, 'total_elements');
        $this->page_size = data_get($data, 'page_size');
        $this->links_first = data_get($data, 'first');
        $this->links_last = data_get($data, 'last');
        $this->links_previous = data_get($data, 'previous');
        $this->links_next = data_get($data, 'next');
    }

}
