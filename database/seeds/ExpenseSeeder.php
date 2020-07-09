<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('expenses')->insert([
            [
                "amount_spent" => 3200000,
                "month" => "Interior",
                "year" => "JAY JAY BADMUS INVESTMENT LTD",
                "project"=> "Allowances Paid Minister to travel for International Conference",
            ],     
            [
                "amount_spent" => 3200000,
                "month" => "Interior",
                "year" => "JAY JAY BADMUS INVESTMENT LTD",
                "project"=> "Allowances Paid Minister to travel for International Conference",
            ],     
            [
                "amount_spent" => 3200000,
                "month" => "Interior",
                "year" => "JAY JAY BADMUS INVESTMENT LTD",
                "project"=> "Allowances Paid Minister to travel for International Conference",
            ],        
        ]);
    }
}
