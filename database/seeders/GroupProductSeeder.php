<?php

namespace Database\Seeders;

use App\Models\GroupProduct;
use Illuminate\Database\Seeder;

class GroupProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupProduct::factory()->count(10)->create();
    }
}
