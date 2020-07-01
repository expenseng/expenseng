<?php

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
                "ministry_id"=> 3,
                "company_id"=> 2,
                "description"=> "Allowances Paid Minister to travel for International Conference",
                "amount"=> 3200000,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 5,
                "company_id"=> 3,
                "description"=> "Repair of Niger Delta Pipeline",
                "amount"=> 45000000,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 2,
                "company_id"=> 3,
                "description"=> "Construction of Power Plant in Ogun State",
                "amount"=> 87500000,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 5,
                "company_id"=> 2,
                "description"=> "Rehabilitation of Senate Building",
                "amount"=> 32800000,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 4,
                "company_id"=> 4,
                "description"=> "Contract for Aso Villa Interior rehabilitation",
                "amount"=> 46700000,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 5,
                "company_id"=> 1,
                "description"=> "Payment for items for COVID-19 outbreak",
                "amount"=> 27671024.12,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 4,
                "company_id"=> 3,
                "description"=> "CONSTRUCTION OF 60KW SOLAR MINI GRIDS IN TAKUM",
                "amount"=> 57869120.98,
                "payment_date"=> now()
            ],
            [
                "ministry_id"=> 6,
                "company_id"=> 1,
                "description"=> "CEMENT SUPPLY FOR NEW MINISTRY OFFICE COMPLEX CONSTRUCTION",
                "amount"=>57869120.98,
                "payment_date"=> now()
            ]
        ]);
    }
}
