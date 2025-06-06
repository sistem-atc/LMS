<?php

namespace App\Services\SpedCte\DTO;

use App\Helpers\EnvironmentHelper;

class SpedCteConfig
{
    public function __construct(
        public string $atualizacao,
        public int $tpAmb,
        public string $razaosocial,
        public string $cnpj,
        public string $cpf,
        public string $siglaUF,
        public string $schemes,
        public string $versao,
        public ProxyConf $proxyConf,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            atualizacao: date('Y-m-d H:i:s'),
            tpAmb: EnvironmentHelper::getAmbient() === 'prod' ? 1 : 2,
            razaosocial: $data['razaosocial'],
            cnpj: $data['cnpj'],
            cpf: $data['cpf'],
            siglaUF: $data['siglaUF'],
            schemes: 'PL_CTe_300',
            versao: '3.00',
            proxyConf: new ProxyConf(
                proxyIp: $data['proxyConf']['proxyIp'],
                proxyPort: $data['proxyConf']['proxyPort'],
                proxyUser: $data['proxyConf']['proxyUser'],
                proxyPass: $data['proxyConf']['proxyPass'],
            )
        );
    }

}
