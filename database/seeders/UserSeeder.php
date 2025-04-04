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

        $findUser = DB::table('users')->where('email', 'kleber.patti' . config('domain.domain'))->first();

        if (!$findUser){
            $user = DB::table('users')->insert([
                'name' => 'Kleber Pracidelli Patti',
                'email' => 'kleber.patti' . config('domain.domain'),
                'branch_logged_id' => '1',
                'password' => bcrypt(config('domain.defaultPass')),
                'is_active' => true,
            ]);
        }

        $findEmployees = DB::table('employees')->where('cpf', '30908105819')->first();

        if (!$findEmployees){
            DB::table('employees')->insert([
                'user_id' => $user,
                'branch_id' => '1',
                'name' => 'Kleber Pracidelli Patti',
                'cpf' => '30908105819',
                'personalmail' => 'sistem.atc@gmail.com',
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
                'is_active' => true,
            ]);
        }
    }
}
