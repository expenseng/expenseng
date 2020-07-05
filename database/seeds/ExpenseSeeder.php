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
                
                "ministry" => "Interior",
                "company" => "JAY JAY BADMUS INVESTMENT LTD",
                "description"=> "Allowances Paid Minister to travel for International Conference",
                "amount"=> 3200000,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Petroleum",
                "company" => "Dangote Group",
                "description"=> "Repair of Niger Delta Pipeline",
                "amount"=> 45000000,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Power",
                "company" => "WATERBASE ENGINEERING LIMITED",
                "description"=> "Construction of Power Plant in Ogun State",
                "amount"=> 87500000,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Works & Housing",
                "company" => "AKINYOSOYE  OLADOTUN",
                "description"=> "Rehabilitation of Senate Building",
                "amount"=> 32800000,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Works & Housing",
                "company" => "AKINYOSOYE  OLADOTUN",
                "description"=> "Contract for Aso Villa Interior rehabilitation",
                "amount"=> 46700000,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Health",
                "company" => "GEOID CONSULT LTD",
                "description"=> "Payment for items for COVID-19 outbreak",
                "amount"=> 27671024.12,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Power",
                "company" => "MARITIME PROJECT SERVICES LIMITED",
                "description"=> "CONSTRUCTION OF 60KW SOLAR MINI GRIDS IN TAKUM",
                "amount"=> 57869120.98,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            [
                
                "ministry" => "Works & Housing",
                "company" => "Dangote Group",
                "description"=> "CEMENT SUPPLY FOR NEW MINISTRY OFFICE COMPLEX CONSTRUCTION",
                "amount"=>57869120.98,
                "payment_date"=> Carbon::create('2019', '11', '04')
            ],
            
            [
                "ministry" => "Petroleum",
                "company" => "Mr. Oluwatosin Kamoru  Osijirin",
                "amount" => 6958234.15,
                "description" => "Import Duties",
                "payment_date" => Carbon::create('2019', '02', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "CCCEC",
                "amount" => 5778413.63,
                "description" => "40km Rail Project Milestone 1",
                "payment_date" => Carbon::create('2020', '03', '04')
            ],
            [
                "ministry" => "Education",
                "company" => "Ziang Foods",
                "amount" => 5612669.77,
                "description" => "School Feeding Program Batch 1",
                "payment_date" => Carbon::create('2018', '03', '01')
            ],
            [
                "ministry" => "Education",
                "company" => "Mr. Emmanuel Okpo Onukak",
                "amount" => 5469294.84,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2018', '04', '01')
            ],
            [
            
                "ministry" => "Works & Housing",
                "company" => "Joe and Sons",
                "amount" => 5443063.80,
                "description" => "Renovation of FHA estate, kwali",
                "payment_date" => Carbon::create('2019', '09', '09')
            ],
            [
                "ministry" => "Petroleum",
                "company" => "Engr. Micheal Ayodeji Dada",
                "amount" => 7889871.57,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2020', '04', '02')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "Jobeg Constructors",
                "amount" => 217049880.64,
                "description" => "Low-cost Federal Housing Estate",
                "payment_date" => Carbon::create('2019', '05', '11')
            ],
            [
                "ministry" => "Education",
                "company" => "Mr. Olamide Titus Ajayi",
                "amount" => 5561063.72,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2020', '01', '01')
            ],
            [
                "ministry" => "Education",
                "company" => "Mr. Joseph Olabode Oge",
                "amount" => 5762487.54,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2020', '03', '21')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "Mr. Francis Itegbe",
                "amount" => 7917837.13,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2019', '04', '04')
            ],
            [
                "ministry" => "Education",
                "company" => "Mr. Pascal Okechukwu Ndubuisi",
                "amount" => 7535342.20,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2019', '02', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "Mrs. Margaret Kokomma Kelvin-Woluchem",
                "amount" => 7914455.37,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2020', '02', '01')
            ],
            [
                "ministry" => "Education",
                "company" => "Ziang Foods",
                "amount" => 5612669.77,
                "description" => "School Feeding Program Batch 3",
                "payment_date" => Carbon::create('2019', '13', '01')
            ],
            [
                "ministry" => "Petroleum",
                "company" => "Mrs. Edu Victor  Antai",
                "amount" => 6721612.26,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2019', '02', '01')
            ],
            [
                "ministry" => "Petroleum",
                "company" => "Kamuru Imports",
                "amount" => 16958234.15,
                "description" => "Fuel Subsidy",
                "payment_date" => Carbon::create('2020', '04', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "CCCEC",
                "amount" => 5778413.63,
                "description" => "Lagos-Ibadan",
                "payment_date" => Carbon::create('2020', '03', '01')
            ],
            [
                "ministry" => "Petroleum",
                "company" => "Haliburton Int'l",
                "amount" => 126958234.15,
                "description" => "Turn Around Maintenance",
                "payment_date" => Carbon::create('2020', '02', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "CCCEC",
                "amount" => 5778413.63,
                "description" => "Lagos-Ibadan express",
                "payment_date" => Carbon::create('2020', '03', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "Julius Berger",
                "amount" => 235778413.63,
                "description" => "Oshodi-Apapa express",
                "payment_date" => Carbon::create('2020', '05', '01')
            ],
            [
                "ministry" => "Works & Housing",
                "company" => "Mrs. Margaret Kokomma Kelvin-Woluchem",
                "amount" => 207094208.37,
                "description" => "3rd Mainland Bridge - routine maintenance",
                "payment_date" => Carbon::create('2018', '12', '20')
            ],
            [
                "ministry" => "Education",
                "company" => "Ziang Foods",
                "amount" => 5612669.77,
                "description" => "School Feeding Program Batch B",
                "payment_date" => Carbon::create('2018', '05', '01')
            ],
            [
                "ministry" => "Petroleum",
                "company" => "Mrs. Edu Victor  Antai",
                "amount" => 6721612.26,
                "description" => "STAFF HOUSING AND COLA 2020",
                "payment_date" => Carbon::create('2018', '09', '06')
            ]
        
        ]);
    }
}
