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
                "industry"=> "@a_dangote"
            ],
            [
                "name"=> "WATERBASE ENGINEERING LIMITED",
                "twitter"=> "@waterbase_ng",
                "ceo"=> "Chima Nwogu",
                "industry"=> "@c_nwogu"
            ],
            [
                "name"=> "AKINYOSOYE  OLADOTUN",
                "twitter"=> "@akinsonye_oladotun",
                "ceo"=> "AKINYOSOYE  OLADOTUN",
                "industry"=> "@akinsonye_oladotun"
            ],
            [
                "name"=> "MARITIME PROJECT SERVICES LIMITED",
                "twitter"=> "@maritimeprojectservice",
                "ceo"=> "Moses Babalola",
                "industry"=> "@m_babalola"
            ],
            [
                "name"=> "GEOID CONSULT LTD",
                "twitter"=> "@geoidconsultltd",
                "ceo"=> "Aluko Francis",
                "industry"=> "@a_francis"
            ],
            [
                "name"=> "JAY JAY BADMUS INVESTMENT LTD",
                "twitter"=> "@jayjay_badmusltd",
                "ceo"=> "Martin King",
                "industry"=> "@martinking"
            ]
        ]);
    }
}
