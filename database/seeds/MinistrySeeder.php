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
                        "code" => "001",
                        "name" => "Ministry of Interior",
                        "shortname" => "Interior",
                        "twitter"=> "@minofinteriorng",
                        "head" => "Rauf Aregbesola",
                        "website" => "https://interior.gov.ng",
                        "sector_id" => 1
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Petroleum Resources",
                        "shortname" => "Petroleum",
                        "twitter"=> "@FMPRng",
                        "head" => "Muhammadu Buhari",
                        "website" => "https://petroleumresources.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Power",
                        "shortname" => "Power",
                        "twitter"=> "@powerminigeria",
                        "head" => "Saleh Mamman",
                        "website" => "https://www.power.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Works and Housing",
                        "shortname" => "Works & Housing",
                        "twitter"=> "@fmwhning",
                        "head" => "Babatunde Fashola",
                        "website" => "https://worksandhousing.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Finance",
                        "shortname" => "Finance",
                        "twitter"=> "@nigeriamfa",
                        "head" => "Zainab Ahmed",
                        "website" => "https://www.finance.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Health",
                        "shortname" => "Health",
                        "twitter"=> "@fmohng",
                        "head" => "Osagie Ehanire",
                        "website" => "https://www.health.gov.ng",
                        "sector_id" => 5
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Industry, Trade and Investment",
                        "shortname" => "Trade and Investment",
                        "twitter"=> "@tradeinvestng",
                        "head" => "Adeniyi Adebayo",
                        "website" => "https://nipc.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Federal Capital Territory",
                        "shortname" => "FCT",
                        "twitter"=> "@officialFCTA",
                        "head" => "Mohammed Bello",
                        "website" => "https://www.fcda.gov.ng",
                        "sector_id" => 4
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Labour and Employment",
                        "shortname" => "Labour",
                        "twitter"=> "@LabourMinNG",
                        "head" => "Chris Ngige",
                        "website" => "https://labour.gov.ng",
                        "sector_id" => 2
                    ],
                    
                    [
                        "code" => "001",
                        "name" => "Ministry of Mines and Steel Development",
                        "shortname" => "Mines and Steel",
                        "twitter"=> "@fmmsdngr",
                        "head" => "Olamilekan Adegbite",
                        "website" => "https://www.minesandsteel.gov.ng",
                        "sector_id" => 2
                    ],
                    [
                        "code" => "001",
                        "name" => "Ministry of Niger Delta",
                        "shortname" => "Niger Delta",
                        "twitter"=> "@fmmsdngr",
                        "head" => "Godswill Akpabio",
                        "website" => "https://www.nigerdelta.gov.ng",
                        "sector_id" => 4
                    ],
        ]);
    }
}
