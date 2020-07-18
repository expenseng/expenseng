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
            "name" =>"1",
            "shortname" => "Revised Estimated Total Cost 
            for the Constructions of 
            2X60MVA, 132/33KV 
            Substation at Odogunyan, 
            2X60MVA, 132/33KV 
            Substation at Ayobo, Ikeja 
            West-Ayobo 132KV D/C 
            Transmission Lines and 
            2X132KV Lines Bays Extension 
            at Ikeja West",
            "industry"=> "LAGA CE Power Limited",
            "ceo"=> "N3,502,347,285.84",
            "twitter"=> "3 Months"
        ],
        [
            "name" =>"2",
            "shortname" => "Award of contract for Soil 
            Erosion and Flood Control 
            Project in Kwoi Town, Jaba
            LGA, Kaduna State",
            "industry"=> "Harris & 
            Dome Nigeria Limited",
            "ceo"=> "N899,391,526.78",
            "twitter"=> "9 Months"
        ],
        [
            "name" =>"3",
            "shortname" => "Award of contract for the 
            Development of IT Integrated 
            Automation and Interactive 
            Portal for the Ministry of 
            Mines and Steel Development",
            "industry"=> "Westblue 
            Nigeria Limited",
            "ceo"=> "N732,966,461.03",
            "twitter"=> "5 Months"
        ],
        [
            "name" =>"4",
            "shortname" => "Award of contract for the 
            completion of Sabke/Dutsi and 
            Mashi Water Supply Project in 
            Katsina State",
            "industry"=> "Bran & 
            Luebbe Water 
            Engineers (Nig.) 
            Limited",
            "ceo"=> "N1,735,272,435.33",
            "twitter"=> "18 months"
        ],
        [
            "name" =>"5",
            "shortname" => "Award of contract for Direct 
            Procurement and Acquisition 
            of Microsoft Office 365 
            Enterprise License by the 
            National Pension Commission",
            "industry"=> "Microsoft 
            Ireland",
            "ceo"=> "N164,300,086.92",
            "twitter"=> " "
        ],
        [
            "name" =>"6",
            "shortname" => "Revised Estimated Total Cost 
            (RETC) of the contract for the 
            upgrade and rehabilitation of
            the Kaduna International Airport Terminal",
            "industry"=> "Dari 
            Investment Limited",
            "ceo"=> "N1,164,523,063.09",
            "twitter"=> "6 Months"
        ]
        ]);
    }
}
