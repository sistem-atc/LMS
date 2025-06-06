<?php

namespace Database\Seeders;

use App\Models\FreightTable;
use Illuminate\Database\Seeder;

class FreightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FreightTable::factory(5)->create();
    }
}
