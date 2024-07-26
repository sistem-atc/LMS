<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Enums\TypeBranchEnum;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Branch::create([
            'abbreviation' => 'MTZ',
            'name' => 'G2L LOGISTICA S.A',
            'phantasy_name' => 'G2L LOGISTICA S.A',
            'cnpj' => '29081265000143',
            'type_branch' => TypeBranchEnum::MATRIZ,
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

        Branch::factory()->count(1)->create();
    }
}
