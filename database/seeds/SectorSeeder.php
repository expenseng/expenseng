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
        //
        DB::table('sectors')->insert([
            [
              "sector_name"=>"Economic",
              "mdas"=> ["id" => 1,"id" => 2,"id" => 3]
            ],
            [
              "sector_name"=> "Finance",
              "mda_ids"=> ["id"=> 5 ]
            ]
          ]);
    }
}
