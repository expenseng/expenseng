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
                "name"=> "Dangote Group",
                "twitter"=> "@dangote_group",
                "ceo"=> "Aliko Dangote",
                "industry"=> "Construction"
            ],
            [
                "name"=> "WATERBASE ENGINEERING LIMITED",
                "twitter"=> "@waterbase_ng",
                "ceo"=> "Chima Nwogu",
                "industry"=> "Engineering"
            ],
            [
                "name"=> "AKINYOSOYE  OLADOTUN",
                "twitter"=> "@akinsonye_oladotun",
                "ceo"=> "AKINYOSOYE  OLADOTUN",
                "industry"=> "Consulting"
            ],
            [
                "name"=> "MARITIME PROJECT SERVICES LIMITED",
                "twitter"=> "@maritimeprojectservice",
                "ceo"=> "Moses Babalola",
                "industry"=> "Maritime"
            ],
            [
                "name"=> "GEOID CONSULT LTD",
                "twitter"=> "@geoidconsultltd",
                "ceo"=> "Aluko Francis",
                "industry"=> "Consulting"
            ],
            [
                "name"=> "JAY JAY BADMUS INVESTMENT LTD",
                "twitter"=> "@jayjay_badmusltd",
                "ceo"=> "Martin King",
                "industry"=> "Finance"
            ]
        ]);
    }
}
