<?php

namespace App\Services\Banks\Banks\Itau\Methods;

trait Pagador
{

    private string $endPoint;

    public function alterarPagador(array $data): array
    {

        $this->endPoint = '/boletos/' . $data['id_boleto'] . '/pagador';

        $message = json_encode(
            [
                'pagador' => [
                    'pessoa' => [
                        'nome_pessoa' => $data['codigo_tipo_desconto'],
                        'tipo_pessoa' => [
                            'codigo_tipo_pessoa' => $data['codigo_tipo_pessoa'],
                            'numero_cadastro_nacional_pessoa_juridica' => $data['numero_cadastro_nacional_pessoa_juridica'],
                        ],
                    ],
                    'endereco' => [
                        'nome_logradouro' => $data['nome_logradouro'],
                        'nome_bairro' => $data['nome_bairro'],
                        'nome_cidade' => $data['nome_cidade'],
                        'sigla_uf' => $data['sigla_uf'],
                        'numero_cep' => $data['numero_cep'],
                    ],
                    'mensagem_email' => $data['mensagem_email'],
                    'assunto_email' => $data['assunto_email'],
                    'pagador' => [
                        'texto_endereco_email' => $data['texto_endereco_email'],
                    ],
                ],
            ]
        );

        return $this->pendingRequest->patch(self::$endPoint, $message)->json();

    }

}
