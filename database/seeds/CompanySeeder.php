<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
        [
            "snumber"=> "1",
            "service" => "Revised Estimated Total Cost 
            for the Constructions of 
            2X60MVA, 132/33KV 
            Substation at Odogunyan, 
            2X60MVA, 132/33KV 
            Substation at Ayobo, Ikeja 
            West-Ayobo 132KV D/C 
            Transmission Lines and 
            2X132KV Lines Bays Extension 
            at Ikeja West",
            "companyname"=> "LAGA CE Power Limited",
            "cost"=> "N3,502,347,285.84",
            "duration"=> "3 Months"
        ],
        [
            "snumber"=> "2",
            "service" => "Award of contract for Soil 
            Erosion and Flood Control 
            Project in Kwoi Town, Jaba
            LGA, Kaduna State",
            "companyname"=> "Harris & 
            Dome Nigeria Limited",
            "cost"=> "N899,391,526.78",
            "duration"=> "9 Months"
        ],
        [
            "snumber"=> "3",
            "service" => "Award of contract for the 
            Development of IT Integrated 
            Automation and Interactive 
            Portal for the Ministry of 
            Mines and Steel Development",
            "companyname"=> "Westblue 
            Nigeria Limited",
            "cost"=> "N732,966,461.03",
            "duration"=> "5 Months"
        ],
        [
            "snumber"=> "4",
            "service" => "Award of contract for the 
            completion of Sabke/Dutsi and 
            Mashi Water Supply Project in 
            Katsina State",
            "companyname"=> "Bran & 
            Luebbe Water 
            Engineers (Nig.) 
            Limited",
            "cost"=> "N1,735,272,435.33",
            "duration"=> "18 months"
        ],
        [
            "snumber"=> "5",
            "service" => "Award of contract for Direct 
            Procurement and Acquisition 
            of Microsoft Office 365 
            Enterprise License by the 
            National Pension Commission",
            "companyname"=> "Microsoft 
            Ireland",
            "cost"=> "N164,300,086.92",
            "duration"=> " "
        ],
        [
            "snumber"=> "6",
            "service" => "Revised Estimated Total Cost 
            (RETC) of the contract for the 
            upgrade and rehabilitation of
            the Kaduna International Airport Terminal",
            "companyname"=> "Dari 
            Investment Limited",
            "cost"=> "N1,164,523,063.09",
            "duration"=> "6 Months"
        ]
        ]);
    }
}
