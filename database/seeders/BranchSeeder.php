<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            'abbreviation' => 'MATRIZ',
            'name' => 'G2L LOGISTICA S.A',
            'cnpj' => '29081265000143',
            'type_branch' => '1',
            'municipal_registration' => '',
            'state_registration' => '206603970114',
            'postal_code' => '06460000',
            'street' => 'AV TAMBORE',
            'complement' => 'EDIF CANOPUS CORP ALPHAV CONJ DE ESCRITORIO 211 A ANDAR 21',
            'number' => '267',
            'district' => 'TAMBORE',
            'city' => 'BARUERI',
            'state' => 'SP',
            'ibge' => '3505708',
            'gia' => '2069',
            'ddd' => '11',
            'siafi' => '6213',
        ]);
    }
}
