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
        DB::table('sectors')->insert([
            [
                "name" => "Administration",
            ],
            [
                "name" => "Economic",
            ],
            [
                "name" => "Judiciary",
            ],
            [
                "name" => "Regional",
            ],
            [
                "name" => "Social",
            ]
        ]);
    }
}
