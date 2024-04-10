<?php

namespace Database\Seeders;

use App\Models\GroupCustomer;
use Illuminate\Database\Seeder;

class GroupCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupCustomer::factory()->count(50)->create();
    }
}
