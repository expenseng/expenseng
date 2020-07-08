<?php

use Illuminate\Database\Seeder;
include 'CompanySeeder.php';
include 'MinistrySeeder.php';
include 'ExpenseSeeder.php';
include 'SectorSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectorSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(MinistrySeeder::class);
        $this->call(ExpenseSeeder::class);
        
    }
}
