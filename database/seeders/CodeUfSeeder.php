<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeUfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('code_ufs')->insert([

            ['code_uf' => 11, 'federation_unit'=> 'Rondônia', 'uf' => 'RO', ],
            ['code_uf' => 12, 'federation_unit'=> 'Acre', 'uf' => 'AC', ],
            ['code_uf' => 13, 'federation_unit'=> 'Amazonas', 'uf' => 'AM', ],
            ['code_uf' => 14, 'federation_unit'=> 'Roraima', 'uf' => 'RR', ],
            ['code_uf' => 15, 'federation_unit'=> 'Pará', 'uf' => 'PA', ],
            ['code_uf' => 16, 'federation_unit'=> 'Amapá', 'uf' => 'AP', ],
            ['code_uf' => 17, 'federation_unit'=> 'Tocantins','uf' => 'TO', ],
            ['code_uf' => 21, 'federation_unit'=> 'Maranhão','uf' => 'MA', ],
            ['code_uf' => 22, 'federation_unit'=> 'Piauí','uf' => 'PI', ],
            ['code_uf' => 23, 'federation_unit'=> 'Ceará','uf' => 'CE', ],
            ['code_uf' => 24, 'federation_unit'=> 'Rio Grande do Norte', 'uf' => 'RN', ],
            ['code_uf' => 25, 'federation_unit'=> 'Paraíba', 'uf' => 'PB', ],
            ['code_uf' => 26, 'federation_unit'=> 'Pernambuco', 'uf' => 'PE', ],
            ['code_uf' => 27, 'federation_unit'=> 'Alagoas', 'uf' => 'AL', ],
            ['code_uf' => 28, 'federation_unit'=> 'Sergipe', 'uf' => 'SE', ],
            ['code_uf' => 29, 'federation_unit'=> 'Bahia', 'uf' => 'BA', ],
            ['code_uf' => 31, 'federation_unit'=> 'Minas Gerais', 'uf' => 'MG', ],
            ['code_uf' => 32, 'federation_unit'=> 'Espírito Santo', 'uf' => 'ES', ],
            ['code_uf' => 33, 'federation_unit'=> 'Rio de Janeiro', 'uf' => 'RJ', ],
            ['code_uf' => 35, 'federation_unit'=> 'São Paulo', 'uf' => 'SP', ],
            ['code_uf' => 41, 'federation_unit'=> 'Paraná', 'uf' => 'PR', ],
            ['code_uf' => 42, 'federation_unit'=> 'Santa Catarina', 'uf' => 'SC', ],
            ['code_uf' => 43, 'federation_unit'=> 'Rio Grande do Sul', 'uf' => 'RS', ],
            ['code_uf' => 50, 'federation_unit'=> 'Mato Grosso do Sul', 'uf' => 'MS', ],
            ['code_uf' => 51, 'federation_unit'=> 'Mato Grosso', 'uf' => 'MT', ],
            ['code_uf' => 52, 'federation_unit'=> 'Goiás', 'uf' => 'GO', ],
            ['code_uf' => 53, 'federation_unit'=> 'Distrito Federal', 'uf' => 'DF', ],

        ]);

    }
}
