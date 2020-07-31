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
                        "name" => "Interior",
                        "shortname" => "Interior",
                        "twitter"=> "@minofinteriorng",
                        "website" => "https://interior.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0232",
                        "ministry_name" => "Petroleum Resources",
                        "shortname" => "Petroleum",
                        "twitter"=> "@FMPRng",
                        "website" => "https://petroleumresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0231",
                        "ministry_name" => "Power",
                        "shortname" => "Power",
                        "twitter"=> "@powerminigeria",
                        "website" => "https://www.power.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0234",
                        "ministry_name" => "Works and Housing",
                        "shortname" => "Works",
                        "twitter"=> "@fmwhning",
                        "website" => "https://worksandhousing.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0220",
                        "ministry_name" => "Finance",
                        "shortname" => "Finance",
                        "twitter"=> "@nigeriamfa",
                        "website" => "https://www.finance.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0521",
                        "ministry_name" => "Health",
                        "shortname" => "Health",
                        "twitter"=> "@fmohng",
                        "website" => "https://www.health.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0222",
                        "ministry_name" => "Industry, Trade and Investment",
                        "shortname" => "Trade",
                        "twitter"=> "@tradeinvestng",
                        "website" => "https://nipc.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0437",
                        "ministry_name" => "Federal Capital Territory",
                        "shortname" => "FCT",
                        "twitter"=> "@officialFCTA",
                        "website" => "https://www.fcda.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0227",
                        "ministry_name" => "Labour and Employment",
                        "shortname" => "Labour",
                        "twitter"=> "@LabourMinNG",
                        "website" => "https://labour.gov.ng",
                        "sector_id" => 2
                    ],
                    
                    [
                        "code" => "0233",
                        "ministry_name" => "Mines and Steel Development",
                        "shortname" => "Mines",
                        "twitter"=> "@fmmsdngr",
                        "website" => "https://www.minesandsteel.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0451",
                        "ministry_name" => "Niger Delta",
                        "shortname" => "Niger",
                        "twitter"=> "@fmmsdngr",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0535",
                        "ministry_name" => "Environment",
                        "shortname" => "Environment",
                        "twitter"=> "@FMEnvng",
                        "website" => "https://environment.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0164",
                        "ministry_name" => "Special Duties",
                        "shortname" => "Special",
                        "twitter" => null,
                        "website" => null,
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0119",
                        "ministry_name" => "Foreign Affairs",
                        "shortname" => "Foreign",
                        "twitter"=> "@nigeriamfa",
                        "website" => "https://www.foreignaffairs.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0228",
                        "ministry_name" => "Science and Techonology",
                        "shortname" => "SciTech",
                        "twitter"=> "@fmstng",
                        "website" => "https://scienceandtech.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0252",
                        "ministry_name" => "Water Resources",
                        "shortname" => "Water",
                        "twitter"=> "@fmwrnigeria",
                        "website" => "https://waterresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0156",
                        "ministry_name" => "Communication",
                        "shortname" => "Communication",
                        "twitter"=> "@fmocdenigeria",
                        "website" => "https://www.commtech.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0230",
                        "ministry_name" => "Aviation",
                        "shortname" => "Aviation",
                        "twitter"=> "@fmaviationng",
                        "website" => "https://www.aviation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0116",
                        "ministry_name" => "Defence",
                        "shortname" => "Defence",
                        "twitter"=> "@DefenceInfoNG",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0123",
                        "ministry_name" => "Information and Culture",
                        "shortname" => "Information",
                        "twitter"=> "@FMICNigeria",
                        "website" => "https://fmic.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0229",
                        "ministry_name" => "Transportation",
                        "shortname" => "Transportation",
                        "twitter"=> "@mintransportng",
                        "website" => "https://www.transportation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0513",
                        "ministry_name" => "Youths and Sports",
                        "shortname" => "Sports",
                        "twitter"=> "@NigeriaFMYSD",
                        "website" => "https://youthandsport.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0155",
                        "ministry_name" => "Police Affairs",
                        "shortname" => "Police",
                        "twitter"=> "@MinofPoliceNG",
                        "website" => "https://www.npf.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0544",
                        "ministry_name" => "Humanitarian Affairs, Disaster Management and Social Development",
                        "shortname" => "Humanitarian",
                        "twitter"=> "@fmhdsd",
                        "website" => "http://www.fmhds.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0517",
                        "ministry_name" => "Education",
                        "shortname" => "Education",
                        "twitter"=> "@nigeducation",
                        "website" => "https://education.gov.ng",
                        "sector_id" => 5
                    ], 
                    [
                        "code" => "0326",
                        "ministry_name" => "Justice",
                        "shortname" => "Justice",
                        "twitter"=> "@FedMinOfJustice",
                        "website" => "https://www.justice.gov.ng",
                        "sector_id" => 3
                    ],
                    [
                        "code" => "0215",
                        "ministry_name" => "Agriculture and Rural Development",
                        "shortname" => "Agriculture",
                        "twitter"=> "@fmardng",
                        "website" => "https://fmard.gov.ng",
                        "sector_id" => 2
                    ], 
                    [
                        "code" => "0514",
                        "ministry_name" => "Women Affairs and Social Development",
                        "shortname" => "Women",
                        "twitter"=> "@fmwa_ng",
                        "website" => "https://www.womenaffairs.gov.ng",
                        "sector_id" => 5
                    ]
        ]);
    }
}
