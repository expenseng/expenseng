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
                        "twitter_handle"=> "@minofinteriorng",
                        "website" => "https://interior.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0232",
                        "ministry_name" => "Ministry of Petroleum Resources",
                        "shortname" => "Petroleum",
                        "twitter_handle"=> "@FMPRng",
                        "website" => "https://petroleumresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0231",
                        "ministry_name" => "Ministry of Power",
                        "shortname" => "Power",
                        "twitter_handle"=> "@powerminigeria",
                        "website" => "https://www.power.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0234",
                        "ministry_name" => "Ministry of Works and Housing",
                        "shortname" => "Works & Housing",
                        "twitter_handle"=> "@fmwhning",
                        "website" => "https://worksandhousing.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0220",
                        "ministry_name" => "Ministry of Finance",
                        "shortname" => "Finance",
                        "twitter_handle"=> "@nigeriamfa",
                        "website" => "https://www.finance.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0521",
                        "ministry_name" => "Ministry of Health",
                        "shortname" => "Health",
                        "twitter_handle"=> "@fmohng",
                        "website" => "https://www.health.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0222",
                        "ministry_name" => "Ministry of Industry, Trade and Investment",
                        "shortname" => "Trade and Investment",
                        "twitter_handle"=> "@tradeinvestng",
                        "website" => "https://nipc.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0437",
                        "ministry_name" => "Ministry of Federal Capital Territory",
                        "shortname" => "FCT",
                        "twitter_handle"=> "@officialFCTA",
                        "website" => "https://www.fcda.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0227",
                        "ministry_name" => "Ministry of Labour and Employment",
                        "shortname" => "Labour",
                        "twitter_handle"=> "@LabourMinNG",
                        "website" => "https://labour.gov.ng",
                        "sector_id" => 2
                    ],
                    
                    [
                        "code" => "0233",
                        "ministry_name" => "Ministry of Mines and Steel Development",
                        "shortname" => "Mines and Steel",
                        "twitter_handle"=> "@fmmsdngr",
                        "website" => "https://www.minesandsteel.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0451",
                        "ministry_name" => "Ministry of Niger Delta",
                        "shortname" => "Niger Delta",
                        "twitter_handle"=> "@fmmsdngr",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "0535",
                        "ministry_name" => "Ministry of Environment",
                        "shortname" => "Environment",
                        "twitter_handle"=> "@FMEnvng",
                        "website" => "https://environment.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0164",
                        "ministry_name" => "Ministry of Special Duties",
                        "shortname" => "Special Duties",
                        "twitter_handle"=> "",
                        "website" => "",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0119",
                        "ministry_name" => "Minister of Foreign Affairs",
                        "shortname" => "Budget",
                        "twitter_handle"=> "@nigeriamfa",
                        "website" => "https://www.foreignaffairs.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0228",
                        "ministry_name" => "Ministry of Science and Techonology",
                        "shortname" => "Science and Tech",
                        "twitter_handle"=> "@fmstng",
                        "website" => "https://scienceandtech.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0252",
                        "ministry_name" => "Ministry of Water Resources",
                        "shortname" => "Water",
                        "twitter_handle"=> "@fmwrnigeria",
                        "website" => "https://waterresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0156",
                        "ministry_name" => "Ministry of Communication",
                        "shortname" => "Communication",
                        "twitter_handle"=> "@fmocdenigeria",
                        "website" => "https://www.commtech.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0230",
                        "ministry_name" => "Ministry of Aviation",
                        "shortname" => "Aviation",
                        "twitter_handle"=> "@fmaviationng",
                        "website" => "https://www.aviation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0116",
                        "ministry_name" => "Ministry of Defence",
                        "shortname" => "Defence",
                        "twitter_handle"=> "@DefenceInfoNG",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0123",
                        "ministry_name" => "Ministry of Information and Culture",
                        "shortname" => "Information",
                        "twitter_handle"=> "@FMICNigeria",
                        "website" => "https://fmic.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0229",
                        "ministry_name" => "Ministry of Transportation",
                        "shortname" => "Transportation",
                        "twitter_handle"=> "@mintransportng",
                        "website" => "https://www.transportation.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "0513",
                        "ministry_name" => "Ministry of Youths and Sports",
                        "shortname" => "Sports",
                        "twitter_handle"=> "@NigeriaFMYSD",
                        "website" => "https://youthandsport.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0155",
                        "ministry_name" => "Ministry of Police Affairs",
                        "shortname" => "Police",
                        "twitter_handle"=> "@MinofPoliceNG",
                        "website" => "https://www.npf.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "0544",
                        "ministry_name" => "Minister of Humanitarian Affairs, Disaster Management and Social Development",
                        "shortname" => "Humanitarian Affairs",
                        "twitter_handle"=> "@fmhdsd",
                        "website" => "http://www.fmhds.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "0517",
                        "ministry_name" => "Ministry of Education",
                        "shortname" => "Education",
                        "twitter_handle"=> "@nigeducation",
                        "website" => "https://education.gov.ng",
                        "sector_id" => 5
                    ], 
                    [
                        "code" => "0326",
                        "ministry_name" => "Ministry of Justice",
                        "shortname" => "Justice",
                        "twitter_handle"=> "@FedMinOfJustice",
                        "website" => "https://www.justice.gov.ng",
                        "sector_id" => 3
                    ],
                    [
                        "code" => "0215",
                        "ministry_name" => "Minister of Agriculture and Rural Development",
                        "shortname" => "Agriculture",
                        "twitter_handle"=> "@fmardng",
                        "website" => "https://fmard.gov.ng",
                        "sector_id" => 2
                    ], 
                    [
                        "code" => "0514",
                        "ministry_name" => "Ministry of Women Affairs and Social Development",
                        "shortname" => "Women Affairs",
                        "twitter_handle"=> "@fmwa_ng",
                        "website" => "https://www.womenaffairs.gov.ng",
                        "sector_id" => 5
                    ]
        ]);
    }
}
