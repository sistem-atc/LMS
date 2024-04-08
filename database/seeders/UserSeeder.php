<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Kleber',
            'email' => 'kleber.patti@logisticag2l.com.br',
            'cpf' => '30908105819',
            'branche_id'=> '1',
            'branche_logged_id'=> '1',
            'password' => bcrypt('123456789'),
            'postal_code' => '06192140',
            'street' => 'Rua Fortunato de Almeida Camargo',
            'complement' => 'Casa',
            'number' => '15',
            'district' => 'km 18',
            'city' => 'Osasco',
            'state' => 'SP',
            'ibge' => '3534401',
            'gia' => '4923',
            'ddd' => '11',
            'siafi' => '6789',

        ]);
    }
}
