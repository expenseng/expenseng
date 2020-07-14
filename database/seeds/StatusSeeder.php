<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status')->insert([
            [
                "name" => "active", 'description' => 'active account',
            ],
            [
                "name" => "inactive", 'description' => 'inactive or deactivated account',
            ],
            [
                "name" => "suspended", 'description' => 'suspended account',
            ],
        ]);
    }
}
