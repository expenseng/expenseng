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
        DB::table('ministries')->insert([
                     [
                        "code" => "0124",
                        "name" => "Ministry of Interior",
                        "shortname" => "Interior",
                        "twitter"=> "@minofinteriorng",
                        "head" => "Rauf Aregbesola",
                        "website" => "https://interior.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0232",
                        "ministry_name" => "Ministry of Petroleum Resources",
                        "shortname" => "Petroleum",
                        "twitter"=> "@FMPRng",
                        "head" => "Muhammadu Buhari",
                        "website" => "https://petroleumresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0231",
                        "ministry_name" => "Ministry of Power",
                        "shortname" => "Power",
                        "twitter"=> "@powerminigeria",
                        "head" => "Saleh Mamman",
                        "website" => "https://www.power.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0234",
                        "ministry_name" => "Ministry of Works and Housing",
                        "shortname" => "Works",
                        "twitter"=> "@fmwhning",
                        "head" => "Babatunde Fashola",
                        "website" => "https://worksandhousing.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0220",
                        "ministry_name" => "Ministry of Finance",
                        "shortname" => "Finance",
                        "twitter"=> "@nigeriamfa",
                        "head" => "Zainab Ahmed",
                        "website" => "https://www.finance.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0521",
                        "ministry_name" => "Ministry of Health",
                        "shortname" => "Health",
                        "twitter"=> "@fmohng",
                        "head" => "Osagie Ehanire",
                        "website" => "https://www.health.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0222",
                        "ministry_name" => "Ministry of Industry, Trade and Investment",
                        "shortname" => "Trade",
                        "twitter"=> "@tradeinvestng",
                        "head" => "Richard Adeniyi Adebayo",
                        "website" => "https://nipc.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0437",
                        "ministry_name" => "Ministry of Federal Capital Territory",
                        "shortname" => "FCT",
                        "twitter"=> "@officialFCTA",
                        "head" => "Mohammad Musa Bello",
                        "website" => "https://www.fcda.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0227",
                        "ministry_name" => "Ministry of Labour and Employment",
                        "shortname" => "Labour",
                        "twitter"=> "@LabourMinNG",
                        "head" => "Chris Ngige",
                        "website" => "https://labour.gov.ng",
                        "sector_id" => 2
                    ],
                    
                    [
                        "code" => "0233",
                        "ministry_name" => "Ministry of Mines and Steel Development",
                        "shortname" => "Mines",
                        "twitter"=> "@fmmsdngr",
                        "head" => "Olamilekan Adegbite",
                        "website" => "https://www.minesandsteel.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0451",
                        "ministry_name" => "Ministry of Niger Delta",
                        "shortname" => "Niger",
                        "twitter"=> "@fmmsdngr",
                        "head" => "Godswill Akpabio",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0535",
                        "ministry_name" => "Ministry of Environment",
                        "shortname" => "Environment",
                        "twitter"=> "@FMEnvng",
                        "head" => "Muhammed Mahmood",
                        "website" => "https://environment.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0164",
                        "ministry_name" => "Ministry of Special Duties",
                        "shortname" => "Special",
                        "twitter"=> "",
                        "head" => "George Akume",
                        "website" => "",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0119",
                        "ministry_name" => "Ministry of Foreign Affairs",
                        "shortname" => "Foreign",
                        "twitter"=> "@nigeriamfa",
                        "head" => "Zubair Dada",
                        "website" => "https://www.foreignaffairs.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0228",
                        "ministry_name" => "Ministry of Science and Techonology",
                        "shortname" => "SciTech",
                        "twitter"=> "@fmstng",
                        "head" => "Mohammed Abdullahi",
                        "website" => "https://scienceandtech.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0252",
                        "ministry_name" => "Ministry of Water Resources",
                        "shortname" => "Water",
                        "twitter"=> "@fmwrnigeria",
                        "head" => "Suleiman Adamu",
                        "website" => "https://waterresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0156",
                        "ministry_name" => "Ministry of Communication",
                        "shortname" => "Communication",
                        "twitter"=> "@fmocdenigeria",
                        "head" => "Ali Isa Pantami",
                        "website" => "https://www.commtech.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0230",
                        "ministry_name" => "Ministry of Aviation",
                        "shortname" => "Aviation",
                        "twitter"=> "@fmaviationng",
                        "head" => "Sirika Hadi",
                        "website" => "https://www.aviation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0116",
                        "ministry_name" => "Ministry of Defence",
                        "shortname" => "Defence",
                        "twitter"=> "@DefenceInfoNG",
                        "head" => "Bashir Salahi Magashi",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0123",
                        "ministry_name" => "Ministry of Information and Culture",
                        "shortname" => "Information",
                        "twitter"=> "@FMICNigeria",
                        "head" => "Lai Mohammed",
                        "website" => "https://fmic.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0229",
                        "ministry_name" => "Ministry of Transportation",
                        "shortname" => "Transportation",
                        "twitter"=> "@mintransportng",
                        "head" => "Rotimi Amaechi",
                        "website" => "https://www.transportation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0513",
                        "ministry_name" => "Ministry of Youths and Sports",
                        "shortname" => "Sports",
                        "twitter"=> "@NigeriaFMYSD",
                        "head" => "Sunday Dare",
                        "website" => "https://youthandsport.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0155",
                        "ministry_name" => "Ministry of Police Affairs",
                        "shortname" => "Police",
                        "twitter"=> "@MinofPoliceNG",
                        "head" => "Maigari Dingyadi",
                        "website" => "https://www.npf.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0544",
                        "ministry_name" => "Ministry of Humanitarian Affairs, Disaster Management and Social Development",
                        "shortname" => "Humanitarian",
                        "twitter"=> "@fmhdsd",
                        "head" => "Sadiya Umar Faruk",
                        "website" => "http://www.fmhds.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0517",
                        "ministry_name" => "Ministry of Education",
                        "shortname" => "Education",
                        "twitter"=> "@nigeducation",
                        "head" => "Adamu Adamu",
                        "website" => "https://education.gov.ng",
                        "sector_id" => 5
                    ], 
                    [
                        "code" => "0326",
                        "ministry_name" => "Ministry of Justice",
                        "shortname" => "Justice",
                        "twitter"=> "@FedMinOfJustice",
                        "head" => "Abubakar Malami",
                        "website" => "https://www.justice.gov.ng",
                        "sector_id" => 3
                    ],
                    [
                        "code" => "0215",
                        "ministry_name" => "Ministry of Agriculture and Rural Development",
                        "shortname" => "Agriculture",
                        "twitter"=> "@fmardng",
                        "head" => "Sabo Nanono",
                        "website" => "https://fmard.gov.ng",
                        "sector_id" => 2
                    ], 
                    [
                        "code" => "0514",
                        "ministry_name" => "Ministry of Women Affairs and Social Development",
                        "shortname" => "Women",
                        "twitter"=> "@fmwa_ng",
                        "head" => "Paulen Tallen",
                        "website" => "https://www.womenaffairs.gov.ng",
                        "sector_id" => 5
                    ]
        ]);
    }
}
