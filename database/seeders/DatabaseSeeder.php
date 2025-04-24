<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BranchSeeder::class);
        $this->call(FreightTableSeeder::class);
        $this->call(GroupCustomerSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(NatureSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(CostCenterSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(DepartamentSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(HealthPlanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SituationSeeder::class);
        $this->call(PaymentTermSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(CodeUfSeeder::class);
    }
}
