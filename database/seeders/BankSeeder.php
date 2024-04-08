<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banks')->insert([
            'cnpj' => '60.701.190/0001-04',
            'codigo' => '341',
            'agencia' => '4807',
            'conta' => '64625',
            'dv_conta' => '4',
            'nome_banco' => 'ITAU UNIBANCO S.A.',
            'postal_code' => '04.344-902',
            'street' => 'PC ALFREDO EGYDIO DE SOUZA ARANHA',
            'complement' => '',
            'number' => '100',
            'district' => 'PARQUE JABAQUARA',
            'city' => 'SAO PAULO',
            'state' => 'SP',
            'ibge' => '3550308',
            'gia' => '1004',
            'ddd' => '11',
            'siafi' => '7107',
            'contato' => 'Raquel',
            'use_api' => true,
            'use_cnab' => false,
            'client_id' => '46f9b6aa-0f38-477a-8d85-eebfb4bb098b',
            'client_secret' => 'b2b80d30-9fb9-492b-8618-3d5d95d7d8a8',
            'path_crt' => '01_341.crt',
            'path_key' => '01_341.key',
            'fine' =>  '2',
            'interests' => '1',
            'protest' => '0',
            'days_protest' => '0',
            'wallet' => '154',
            'coin_type' => 'reais',

        ]);
    }
}
