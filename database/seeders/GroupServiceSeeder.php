<?php

namespace Database\Seeders;

use App\Models\GroupService;
use Illuminate\Database\Seeder;

class GroupServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupService::factory()->count(10)->create();
    }
}
