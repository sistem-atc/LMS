<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('routes')->insert([
            'name' => 'Rota Teste',
            'active' => true,
            'origin_branche_id' => '1',
            'recipient_branche_id' => '1',
            'municipal_route' => false,
        ]);
    }
}
