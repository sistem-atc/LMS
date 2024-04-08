<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('situations')->insert([
            'name' => 'Carteira',
        ]);
        DB::table('situations')->insert([
            'name' => 'Pefin Serasa',
        ]);
        DB::table('situations')->insert([
            'name' => 'Boleto',
        ]);
        DB::table('situations')->insert([
            'name' => 'Protesto',
        ]);
    }
}
