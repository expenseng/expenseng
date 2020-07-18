<?php

use Illuminate\Database\Seeder;
include 'CompanySeeder.php';
include 'MinistrySeeder.php';
include 'PaymentSeeder.php';
include 'SectorSeeder.php';
include 'ExpenseSeeder.php';
include 'BudgetSeeder.php';
include 'CabinetSeeder.php';
include 'FeedbackSeeder.php';

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
        $this->call(ExpenseSeeder::class);
        $this->call(PaymentSeeder::class); 
        $this->call(BudgetSeeder::class);  
        $this->call(MinistrySeeder::class);
        $this->call(CabinetSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
