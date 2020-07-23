<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activites')->insert([
            [
                'description' => 'Admin set Generic user status to active',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'description' =>
                    'New user with manager privilage created by admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'description' => 'New tweet made from the dashboard',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
