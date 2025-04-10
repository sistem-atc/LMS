<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'social_name' => 'Kleber Pracidelli Patti',
                'mother_name' => 'Marlene Pracidelli',
                'father_name' => 'Silvio Luiz Patti',
                'cpf' => '30908105819',
                'cnh' => '12345678900',
                'pis' => '12345678901',
                'rg' => '123456789',
                'rg_uf' => 'SP',
                'eleitor_title' => '123456789012',
                'eleitoral_zone' => 'SP',
                'selector_section' => '123456',
                'birth_date' => Carbon::createFromFormat('d/m/Y', '31/08/1984')->format('Y-m-d'),
                'sex' => 'M',
                'civil_state' => 'casado',
                'nationality' => 'brasileiro',
                'born_city' => 'Osasco',
                'phone' => '11999999999',
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
                'salary' => '1000.00',
                'admission_date' => Carbon::createFromFormat('d/m/Y', '01/01/2023')->format('Y-m-d'),
                'contract_type' => 'clt',
                'ctps' => '123456789',
                'school_level' => 'superior',
                'bank' => 'Banco do Brasil',
                'agency' => '1234',
                'account' => '123456789',
                'account_type' => 'corrente',
                'transportation_voucher' => false,
                'meal_voucher' => false,
                'food_voucher' => false,
                'basic_cest' => false,
                'life_insurance' => false,
                'private_pension' => false,
                'health_plan' => false,
                'dental_plan' => false,
                'health_plan_type' => 'individual',
                'health_plan_id' => 1,
                'social_security_regime' => 'rgps',
                'position_id' => 1,
                'departament_id' => 1,
            ]);
        }
    }
}
