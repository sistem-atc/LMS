<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            'name' => 'Vendedor Teste',
            'cpf' => '309.081.058-19',
            'email' => 'kleber.patti@logisticag2l.com.br',
            'branch_id' => '1',
        ]);
    }
}
