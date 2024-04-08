<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'cpf_or_cnpj' => '95.591.723/0000-19',
            'company_name' => 'TNT Mercurio',
            'type_person' => 'j',
            'fantasy_name' => 'TNT Mercurio',
            'postal_code' => '06124-130',
            'street' => 'Rua Cláudio Aparecido Oliveira',
            'complement' => 'Fundos',
            'number' => '37',
            'district' => 'Jardim Roberto',
            'city' => 'Osasco',
            'state' => 'SP',
            'ibge' => '3534401',
            'gia' => '4923',
            'ddd' => '11',
            'siafi' => '6789',
            'region' => 'Sudeste',
            'nature_id' => '1',
            'phone_number' => '(11)9156-7462',
            'cellphone' => '(11)91567-4620',
            'vendor_id' => '1',
            'bank_standard_id' => '1',
            'priority' => '0',
            'risc' => 'A',
            'municipal_registration' => '12365478',
            'state_registration' => '12365478',
            'mail_operational' => 'phet@logisticag2l.com.br',
            'mail_financial' => 'contasreceber@logisticag2l.com.br',
            'group_customer_id' => '1'
        ]);
    }
}
