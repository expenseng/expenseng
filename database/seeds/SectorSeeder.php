<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = ["id" => 1,"id" => 2,"id" => 3];
        // DB::table('sectors')->insert([
        //     [
        //       "sector_name"=>"Economic",
        //       "mda_ids"=> json_encode($data)
        //     ],
        //     [
        //       "sector_name"=> "Finance",
        //       "mda_ids"=> ["id"=> 5 ]
        //     ]
        //   ]);
        DB::table('sectors')->insert([
            [
                "sector_name" => "Administration",
            ],
            [
                "sector_name" => "Economic",
            ],
            [
                "sector_name" => "Judiciary",
            ],
            [
                "sector_name" => "Regional",
            ],
            [
                "sector_name" => "Social",
            ]
        ]);
    }
}
