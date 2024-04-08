<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoscenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('costcenters')->insert([
            'cost_center' => '10001010',
            'classification' => 'Prioritario',
            'description' => 'Teste',
            'blocked' => false,
            'email_approver' => 'kleber.patti@logisticag2l.com.br',
        ]);
    }
}
