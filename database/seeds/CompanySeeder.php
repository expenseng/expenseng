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
                "shortname" => "dangote",
                "twitter"=> "@dangote_group",
                "ceo"=> "Aliko Dangote",
                "industry"=> "@a_dangote"
            ],
            [
                "name"=> "WATERBASE ENGINEERING LIMITED",
                "shortname" => "waterbase",
                "twitter"=> "@waterbase_ng",
                "ceo"=> "Chima Nwogu",
                "industry"=> "@c_nwogu"
            ],
            [
                "name"=> "AKINYOSOYE  OLADOTUN",
                "shortname" => "akinsoye",
                "twitter"=> "@akinsonye_oladotun",
                "ceo"=> "AKINYOSOYE  OLADOTUN",
                "industry"=> "@akinsonye_oladotun"
            ],
            [
                "name"=> "MARITIME PROJECT SERVICES LIMITED",
                "shortname" => "maritime",
                "twitter"=> "@maritimeprojectservice",
                "ceo"=> "Moses Babalola",
                "industry"=> "@m_babalola"
            ],
            [
                "name"=> "GEOID CONSULT LTD",
                "shortname" => "geoid",
                "twitter"=> "@geoidconsultltd",
                "ceo"=> "Aluko Francis",
                "industry"=> "@a_francis"
            ],
            [
                "name"=> "JAY JAY BADMUS INVESTMENT LTD",
                "shortname" => "jayjay",
                "twitter"=> "@jayjay_badmusltd",
                "ceo"=> "Martin King",
                "industry"=> "@martinking"
            ]
        ]);
    }
}
