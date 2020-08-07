<?php

use Illuminate\Database\Seeder;
include 'CompanySeeder.php';
include 'MinistrySeeder.php';
include 'PaymentSeeder.php';
include 'SectorSeeder.php';
include 'ExpenseSeeder.php';
include 'BudgetSeeder.php';
include 'CabinetSeeder.php';
include 'StatusSeeder.php';
include 'RoleSeeder.php';
include 'UserSeeder.php';
include 'SidebarArrangementSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call(SectorSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(ExpenseSeeder::class);
        // $this->call(BudgetSeeder::class);
        $this->call(MinistrySeeder::class);
        // $this->call(CabinetSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SidebarArrangementSeeder::class);
    }
}
