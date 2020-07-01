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
                "ministry_name"=> "Ministry of Finance",
                "ministry_shortname"=> "Finance",
                "ministry_twitter_handle"=> "@nigeriamfa",
                "ministry_head"=> "Zainab Ahmed",
                "ministry_head_handle"=> "@z_ahmed"
        ],
        [
                "ministry_name"=> "Ministry of Petroleum Resources",
                "ministry_shortname"=> "Petroleum",
                "ministry_twitter_handle"=> "@fmprng",
                "ministry_head"=> "Muhammadu Buhari",
                "ministry_head_handle"=> "@MBuhari"
        ],
        [
                "ministry_name"=> "Ministry of Interior",
                "ministry_shortname"=> "Interior",
                "ministry_twitter_handle"=> "@minofinteriorng",
                "ministry_head"=> "Rauf Aregbesola",
                "ministry_head_handle"=> "@r_aregbesola"
        ],
        [
                "ministry_name"=> "Ministry of Power",
                "ministry_shortname"=> "Power",
                "ministry_twitter_handle"=> "@powerminigeria",
                "ministry_head"=> "Saleh Mamman",
                "ministry_head_handle"=> "@s_Mamman"
        ],
        [
                "ministry_name"=> "Ministry of Health",
                "ministry_shortname"=> "Health",
                "ministry_twitter_handle"=> "@fmohng",
                "ministry_head"=> "Osagie Ehanire",
                "ministry_head_handle"=> "@o_ehanire"
        ],
        [
                "ministry_name"=> "Ministry of Works and Housing",
                "ministry_shortname"=> "Works & Housing",
                "ministry_twitter_handle"=> "@fmwhning",
                "ministry_head"=> "Babatunde Fashola",
                "ministry_head_handle"=> "@b_fashola"
        ]
            
        ]);
    }
}
