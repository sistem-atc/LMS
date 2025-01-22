<?php

namespace Database\Seeders;

use App\Models\Cte;
use Illuminate\Database\Seeder;

class CteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cte::factory()->count(150)->create();
    }
}
