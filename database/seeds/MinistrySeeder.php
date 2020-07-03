<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ministries_profile')->insert([
                [
                        "ministry_name" => "Ministry of Interior",
                        "ministry_shortname" => "Interior",
                        "ministry_twitter_handle"=> "@minofinteriorng",
                        "ministry_head" => "Rauf Aregbesola",
                        "ministry_head_handle" => "@raufaregbesola",
                        "ministry_website" => "https://interior.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Ministry of Petroleum Resources",
                        "ministry_shortname" => "Petroleum",
                        "ministry_twitter_handle"=> "@minofinteriorng",
                        "ministry_head" => "Muhammadu Buhari",
                        "ministry_head_handle" => "@MBuhari",
                        "ministry_website" => "https://petroleumresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Power",
                        "ministry_shortname" => "Power",
                        "ministry_twitter_handle"=> "@powerminigeria",
                        "ministry_head" => "Saleh Mamman",
                        "ministry_head_handle" => "@EngrSMamman",
                        "ministry_website" => "https://www.power.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Works and Housing",
                        "ministry_shortname" => "Works & Housing",
                        "ministry_twitter_handle"=> "@fmwhning",
                        "ministry_head" => "Babatunde Fashola",
                        "ministry_head_handle" => "@tundefashola",
                        "ministry_website" => "https://worksandhousing.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Finance",
                        "ministry_shortname" => "Finance",
                        "ministry_twitter_handle"=> "@nigeriamfa",
                        "ministry_head" => "Zainab Ahmed",
                        "ministry_head_handle" => "@ZShamsuna",
                        "ministry_website" => "https://www.finance.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Health",
                        "ministry_shortname" => "Health",
                        "ministry_twitter_handle"=> "@fmohng",
                        "ministry_head" => "Osagie Ehanire",
                        "ministry_head_handle" => "@DREOEhanire",
                        "ministry_website" => "https://www.health.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "ministry_name" => "Ministry of Industry, Trade and Investment",
                        "ministry_shortname" => "Trade and Investment",
                        "ministry_twitter_handle"=> "@tradeinvestng",
                        "ministry_head" => "Adeniyi Adebayo",
                        "ministry_head_handle" => "@NiyiAdebayo",
                        "ministry_website" => "https://nipc.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Federal Capital Territory",
                        "ministry_shortname" => "FCT",
                        "ministry_twitter_handle"=> "@officialFCTA",
                        "ministry_head" => "Mohammed Bello",
                        "ministry_head_handle" => "@FCT_Minister",
                        "ministry_website" => "https://www.fcda.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "ministry_name" => "Ministry of Labour and Employment",
                        "ministry_shortname" => "Labour",
                        "ministry_twitter_handle"=> "@LabourMinNG",
                        "ministry_head" => "Chris Ngige",
                        "ministry_head_handle" => "@SenChrisNgige",
                        "ministry_website" => "https://labour.gov.ng",
                        "sector_id" => 2
                    ],
                    
                    [
                        "ministry_name" => "Ministry of Mines and Steel Development",
                        "ministry_shortname" => "Mines and Steel",
                        "ministry_twitter_handle"=> "@fmmsdngr",
                        "ministry_head" => "Olamilekan Adegbite",
                        "ministry_head_handle" => "@_lekanadegbite",
                        "ministry_website" => "https://www.minesandsteel.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Niger Delta",
                        "ministry_shortname" => "Niger Delta",
                        "ministry_twitter_handle"=> "@fmmsdngr",
                        "ministry_head" => "Godswill Akpabio",
                        "ministry_head_handle" => "@Senator_Akpabio",
                        "ministry_website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "ministry_name" => "Ministry of Environment",
                        "ministry_shortname" => "Environment",
                        "ministry_twitter_handle"=> "@tradeinvestng",
                        "ministry_head" => "Adeniyi Adebayo",
                        "ministry_head_handle" => "@NiyiAdebayo",
                        "ministry_website" => "https://environment.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "ministry_name" => "Ministry of Special Duties",
                        "ministry_shortname" => "Special Duties",
                        "ministry_twitter_handle"=> "",
                        "ministry_head" => "George Akume",
                        "ministry_head_handle" => "",
                        "ministry_website" => "",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Minister of Foreign Affairs",
                        "ministry_shortname" => "Budget",
                        "ministry_twitter_handle"=> "@nigeriamfa",
                        "ministry_head" => "Geofrey Onyeama",
                        "ministry_head_handle" => "@geoffreyonyeama",
                        "ministry_website" => "https://www.foreignaffairs.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Ministry of Science and Techonology",
                        "ministry_shortname" => "Science and Tech",
                        "ministry_twitter_handle"=> "@fmstng",
                        "ministry_head" => "Ogbonnaya Onu",
                        "ministry_head_handle" => "@dr_ogbonnayaonu",
                        "ministry_website" => "https://scienceandtech.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Water Resources",
                        "ministry_shortname" => "Water",
                        "ministry_twitter_handle"=> "@fmwrnigeria",
                        "ministry_head" => "Suleiman Adamu",
                        "ministry_head_handle" => "@SHadamufnse",
                        "ministry_website" => "https://waterresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Communication",
                        "ministry_shortname" => "Communication",
                        "ministry_twitter_handle"=> "@fmocdenigeria",
                        "ministry_head" => "Ali Pantami",
                        "ministry_head_handle" => "@drisapantami",
                        "ministry_website" => "https://www.commtech.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Ministry of Aviation",
                        "ministry_shortname" => "Aviation",
                        "ministry_twitter_handle"=> "@fmaviationng",
                        "ministry_head" => "Hadi Sirika",
                        "ministry_head_handle" => "@hadisirika",
                        "ministry_website" => "https://www.aviation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Defence",
                        "ministry_shortname" => "Defence",
                        "ministry_twitter_handle"=> "@DefenceInfoNG",
                        "ministry_head" => "Bashir Salihi Magashi",
                        "ministry_head_handle" => "",
                        "ministry_website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Ministry of Information and Culture",
                        "ministry_shortname" => "Information",
                        "ministry_twitter_handle"=> "@FMICNigeria",
                        "ministry_head" => "Lai Mohammed",
                        "ministry_head_handle" => "@mohammed_lai",
                        "ministry_website" => "https://fmic.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Ministry of Transportation",
                        "ministry_shortname" => "Transportation",
                        "ministry_twitter_handle"=> "@mintransportng",
                        "ministry_head" => "Rotimi Amaechi",
                        "ministry_head_handle" => "@chibuikeamaechi",
                        "ministry_website" => "https://www.transportation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "ministry_name" => "Ministry of Youths and Sports",
                        "ministry_shortname" => "Sports",
                        "ministry_twitter_handle"=> "@NigeriaFMYSD",
                        "ministry_head" => "Sunday Dare",
                        "ministry_head_handle" => "@SundayDareSD",
                        "ministry_website" => "https://youthandsport.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "ministry_name" => "Ministry of Police Affairs",
                        "ministry_shortname" => "Police",
                        "ministry_twitter_handle"=> "@MinofPoliceNG",
                        "ministry_head" => "Muhammadu Dingyadi",
                        "ministry_head_handle" => "@maigaridingyadi",
                        "ministry_website" => "https://www.npf.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "ministry_name" => "Minister of Humanitarian Affairs, Disaster Management and Social Development",
                        "ministry_shortname" => "Humanitarian Affairs",
                        "ministry_twitter_handle"=> "@fmhdsd",
                        "ministry_head" => "Sadiya Umar Farouk",
                        "ministry_head_handle" => "@Sadiya_farouq",
                        "ministry_website" => "http://www.fmhds.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "ministry_name" => "Ministry of Education",
                        "ministry_shortname" => "Education",
                        "ministry_twitter_handle"=> "@nigeducation",
                        "ministry_head" => "Adamu Adamu",
                        "ministry_head_handle" => "",
                        "ministry_website" => "https://education.gov.ng",
                        "sector_id" => 5
                    ], 
                    [
                        "ministry_name" => "Ministry of Justice",
                        "ministry_shortname" => "Justice",
                        "ministry_twitter_handle"=> "@FedMinOfJustice",
                        "ministry_head" => "Abubakar Malami",
                        "ministry_head_handle" => "@MalamiSan",
                        "ministry_website" => "https://www.justice.gov.ng",
                        "sector_id" => 3
                    ]
        ]);
    }
}
