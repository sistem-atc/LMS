<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ModelHasRolesSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(NatureSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(CoscenterSeeder::class);
        $this->call(SituationSeeder::class);
        //$this->call(RouteSeeder::class);
        //$this->call(CustomerSeeder::class);
    }
}
