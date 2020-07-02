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
        DB::table('companies_profile')->insert([
            [
                "company_name"=> "Dangote Group",
                "company_twitter_handle"=> "@dangote_group",
                "company_head"=> "Aliko Dangote",
                "company_head_twitter_handle"=> "@a_dangote"
            ],
            [
                "company_name"=> "WATERBASE ENGINEERING LIMITED",
                "company_twitter_handle"=> "@waterbase_ng",
                "company_head"=> "Chima Nwogu",
                "company_head_twitter_handle"=> "@c_nwogu"
            ],
            [
                "company_name"=> "AKINYOSOYE  OLADOTUN",
                "company_twitter_handle"=> "@akinsonye_oladotun",
                "company_head"=> "AKINYOSOYE  OLADOTUN",
                "company_head_twitter_handle"=> "@akinsonye_oladotun"
            ],
            [
                "company_name"=> "MARITIME PROJECT SERVICES LIMITED",
                "company_twitter_handle"=> "@maritimeprojectservice",
                "company_head"=> "Moses Babalola",
                "company_head_twitter_handle"=> "@m_babalola"
            ],
            [
                "company_name"=> "GEOID CONSULT LTD",
                "company_twitter_handle"=> "@geoidconsultltd",
                "company_head"=> "Aluko Francis",
                "company_head_twitter_handle"=> "@a_francis"
            ],
            [
                "company_name"=> "JAY JAY BADMUS INVESTMENT LTD",
                "company_twitter_handle"=> "@jayjay_badmusltd",
                "company_head"=> "Martin King",
                "company_head_twitter_handle"=> "@martinking"
            ]
        ]);
    }
}
