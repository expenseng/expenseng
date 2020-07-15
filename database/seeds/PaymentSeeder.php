<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $payment = factory(\App\Payment::class, 1000)->create();


        // DB::table('payments')->insert([
        //     [
        //         "payment_no" => "1000660807-20",
        //         "payment_code" => "0124001001",
        //         "organization" => "Interior",
        //         "beneficiary" => "JAY JAY BADMUS INVESTMENT LTD",
        //         "description"=> "Allowances Paid Minister to travel for International Conference",
        //         "amount"=> 3200000,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-21",
        //         "payment_code" => "0232001002",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Dangote Group",
        //         "description"=> "Repair of Niger Delta Pipeline",
        //         "amount"=> 45000000,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-22",
        //         "payment_code" => "0231001003",
        //         "organization" => "Power",
        //         "beneficiary" => "WATERBASE ENGINEERING LIMITED",
        //         "description"=> "Construction of Power Plant in Ogun State",
        //         "amount"=> 87500000,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-23",
        //         "payment_code" => "0234001004",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "AKINYOSOYE  OLADOTUN",
        //         "description"=> "Rehabilitation of Senate Building",
        //         "amount"=> 32800000,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-24",
        //         "payment_code" => "0234001005",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "AKINYOSOYE  OLADOTUN",
        //         "description"=> "Contract for Aso Villa Interior rehabilitation",
        //         "amount"=> 46700000,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-25",
        //         "payment_code" => "0521001006",
        //         "organization" => "Health",
        //         "beneficiary" => "GEOID CONSULT LTD",
        //         "description"=> "Payment for items for COVID-19 outbreak",
        //         "amount"=> 27671024.12,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-26",
        //         "payment_code" => "0231001008",
        //         "organization" => "Power",
        //         "beneficiary" => "MARITIME PROJECT SERVICES LIMITED",
        //         "description"=> "CONSTRUCTION OF 60KW SOLAR MINI GRIDS IN TAKUM",
        //         "amount"=> 57869120.98,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-27",
        //         "payment_code" => "0234001009",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Dangote Group",
        //         "description"=> "CEMENT SUPPLY FOR NEW MINISTRY OFFICE COMPLEX CONSTRUCTION",
        //         "amount"=>57869120.98,
        //         "payment_date"=> Carbon::create('2019', '11', '04')
        //     ],
            
        //     [
        //         "payment_no" => "1000660807-28",
        //         "payment_code" => "0232001031",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Mr. Oluwatosin Kamoru  Osijirin",
        //         "amount" => 6958234.15,
        //         "description" => "Import Duties",
        //         "payment_date" => Carbon::create('2019', '02', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-29",
        //         "payment_code" => "0234001601",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "CCCEC",
        //         "amount" => 8175491.12,
        //         "description" => "40km Rail Project Milestone 1",
        //         "payment_date" => Carbon::create('2020', '03', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-30",
        //         "payment_code" => "0517001901",
        //         "organization" => "Education",
        //         "beneficiary" => "Ziang Foods",
        //         "amount" => 5612669.77,
        //         "description" => "School Feeding Program Batch 1",
        //         "payment_date" => Carbon::create('2018', '03', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-31",
        //         "payment_code" => "0517071001",
        //         "organization" => "Education",
        //         "beneficiary" => "Mr. Emmanuel Okpo Onukak",
        //         "amount" => 5469294.84,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2018', '04', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-32",
        //         "payment_code" => "0234006201",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Joe and Sons",
        //         "amount" => 5443063.80,
        //         "description" => "Renovation of FHA estate, kwali",
        //         "payment_date" => Carbon::create('2019', '09', '09')
        //     ],
        //     [
        //         "payment_no" => "1000660807-33",
        //         "payment_code" => "0232001457",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Engr. Micheal Ayodeji Dada",
        //         "amount" => 7889871.57,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2020', '04', '02')
        //     ],
        //     [
        //         "payment_no" => "1000660807-34",
        //         "payment_code" => "0234001001",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Jobeg Constructors",
        //         "amount" => 217049880.64,
        //         "description" => "Low-cost Federal Housing Estate",
        //         "payment_date" => Carbon::create('2019', '05', '11')
        //     ],
        //     [
        //         "payment_no" => "1000660807-35",
        //         "payment_code" => "0517001521",
        //         "organization" => "Education",
        //         "beneficiary" => "Mr. Olamide Titus Ajayi",
        //         "amount" => 5561063.72,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2020', '01', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-36",
        //         "payment_code" => "0517002001",
        //         "organization" => "Education",
        //         "beneficiary" => "Mr. Joseph Olabode Oge",
        //         "amount" => 5762487.54,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2020', '03', '21')
        //     ],
        //     [
        //         "payment_no" => "1000660807-37",
        //         "payment_code" => "0234008601",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Mr. Francis Itegbe",
        //         "amount" => 7917837.13,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2019', '04', '04')
        //     ],
        //     [
        //         "payment_no" => "1000660807-38",
        //         "payment_code" => "0517001571",
        //         "organization" => "Education",
        //         "beneficiary" => "Mr. Pascal Okechukwu Ndubuisi",
        //         "amount" => 7535342.20,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2019', '02', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-39",
        //         "payment_code" => "0234001231",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Mrs. Margaret Kokomma Kelvin-Woluchem",
        //         "amount" => 7914455.37,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2020', '02', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-40",
        //         "payment_code" => "0517001056",
        //         "organization" => "Education",
        //         "beneficiary" => "Ziang Foods",
        //         "amount" => 5612669.77,
        //         "description" => "School Feeding Program Batch 3",
        //         "payment_date" => Carbon::create('2019', '13', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-41",
        //         "payment_code" => "0231001981",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Mrs. Edu Victor Antai",
        //         "amount" => 6721612.26,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2019', '02', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-42",
        //         "payment_code" => "0231001451",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Kamuru Imports",
        //         "amount" => 16958234.15,
        //         "description" => "Fuel Subsidy",
        //         "payment_date" => Carbon::create('2020', '04', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-43",
        //         "payment_code" => "0234001029",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "CCCEC",
        //         "amount" => 5778413.63,
        //         "description" => "Lagos-Ibadan Phase II",
        //         "payment_date" => Carbon::create('2020', '03', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-44",
        //         "payment_code" => "0231001030",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Haliburton Int'l",
        //         "amount" => 126958234.15,
        //         "description" => "Turn Around Maintenance",
        //         "payment_date" => Carbon::create('2020', '02', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-46",
        //         "payment_code" => "0234001061",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "CCCEC",
        //         "amount" => 5778413.63,
        //         "description" => "Lagos-Ibadan Phase I",
        //         "payment_date" => Carbon::create('2020', '03', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-47",
        //         "payment_code" => "0234001062",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Julius Berger",
        //         "amount" => 235778413.63,
        //         "description" => "Oshodi-Apapa express",
        //         "payment_date" => Carbon::create('2020', '05', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-48",
        //         "payment_code" => "0234001078",
        //         "organization" => "Works & Housing",
        //         "beneficiary" => "Mrs. Margaret Kokomma Kelvin-Woluchem",
        //         "amount" => 207094208.37,
        //         "description" => "3rd Mainland Bridge - routine maintenance",
        //         "payment_date" => Carbon::create('2018', '12', '20')
        //     ],
        //     [
        //         "payment_no" => "1000660807-49",
        //         "payment_code" => "0517001008",
        //         "organization" => "Education",
        //         "beneficiary" => "Ziang Foods",
        //         "amount" => 5612669.77,
        //         "description" => "School Feeding Program Batch B",
        //         "payment_date" => Carbon::create('2018', '05', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-50",
        //         "payment_code" => "0232001048",
        //         "organization" => "Petroleum",
        //         "beneficiary" => "Mrs. Edu Victor  Antai",
        //         "amount" => 6721612.26,
        //         "description" => "STAFF HOUSING AND COLA 2020",
        //         "payment_date" => Carbon::create('2018', '09', '06')
        //     ],
        //     [
        //         "payment_no" => "1000660807-51",
        //         "payment_code" => "0116001678",
        //         "organization" => "MINISTRY OF DEFENCE - MOD HQTRS",
        //         "beneficiary" => "Mrs. Margaret Kokomma Kelvin-Woluchem",
        //         "amount" => 207094208.37,
        //         "description" => "3rd Mainland Bridge - routine maintenance",
        //         "payment_date" => Carbon::create('2018', '12', '20')
        //     ],
        //     [
        //         "payment_no" => "1000660807-52",
        //         "payment_code" => "0116001018",
        //         "organization" => "NIGERIAN AIRFORCE",
        //         "beneficiary" => "NAF 107 NIGERIAN AIR FORCE CAMP",
        //         "amount" => 125473530.76,
        //         "description" => "",
        //         "payment_date" => Carbon::create('2018', '07', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-53",
        //         "payment_code" => "0116001318",
        //         "organization" => "NIGERIAN AIRFORCE",
        //         "beneficiary" => "NAF TRAINING COMMAND",
        //         "amount" => 886484303.64,
        //         "description" => "",
        //         "payment_date" => Carbon::create('2018', '05', '01')
        //     ],
        //     [
        //         "payment_no" => "1000660807-54",
        //         "payment_code" => "0116051019",
        //         "organization" => "Defense",
        //         "beneficiary" => "MINISTRY OF DEFENCE - MOD HQTRS",
        //         "amount" => 6778912.00,
        //         "description" => "Strategic Training I",
        //         "payment_date" => Carbon::create('2020', '03', '26')
        //     ],
        //     [
        //         "payment_no" => "1000660807-55",
        //         "payment_code" => "0116101518",
        //         "organization" => "MINISTRY OF DEFENCE - MOD HQTRS",
        //         "beneficiary" => "CREATION CONSULT SOLUTIONS LTD",
        //         "amount" => 6721612.26,
        //         "description" => "Strategic Training II",
        //         "payment_date" => Carbon::create('2018', '06', '06')
        //     ],
        //     [
        //         "payment_no" => "1000660807-57",
        //         "payment_code" => "0326006018",
        //         "organization" => "FEDERAL MINISTRY OF JUSTICE - HQTRS",
        //         "beneficiary" => "INYONYO ATABOR",
        //         "amount" => 6511600.26,
        //         "description" => "AUDIT QUERY RESPONSES REVIEW",
        //         "payment_date" => Carbon::create('2017', '05', '16')
        //     ],
        //     [
        //         "payment_no" => "1000660807-58",
        //         "payment_code" => "0124041018",
        //         "organization" => "NIGERIA CORRECTIONAL SERVICE",
        //         "beneficiary" => "ALMUJAAFAR ENTERPRISES",
        //         "amount" => 12129205.75,
        //         "description" => "",
        //         "payment_date" => Carbon::create('2019', '05', '16')
        //     ],
        //     [
        //         "payment_no" => "1000660807-60",
        //         "payment_code" => "0215071018",
        //         "organization" => "NATIONAL CENTRE FOR AGRICULTURAL MECHANISATION- ILORIN",
        //         "beneficiary" => "AJIBADE, ADEKUNLE NURUDEEN",
        //         "amount" => 5877962,
        //         "description" => "Construction and Equipping of Cassava and Rice Processing Sheds in Selected Communitiesin 6 Geopolitical Zones",
        //         "payment_date" => Carbon::create('2019', '05', '16')
        //     ],


        
        // ]);
    }
}
