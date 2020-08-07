<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarArrangementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_arrangement')->insert([
            [
                'name' => 'dashboard',
                'position' => 1,
            ],
            [
                'name' => 'users',
                'position' => 2,
            ],
            [
                'name' => 'company',

                'position' => 3,
            ],
            [
                'name' => 'ministry',

                'position' => 4,
            ],
            [
                'name' => 'Expenses',

                'position' => 5,
            ],
            [
                'name' => 'Payments',

                'position' => 6,
            ],
            [
                'name' => 'Cabinet',

                'position' => 7,
            ],
            [
                'name' => 'Sector',

                'position' => 8,
            ],
            [
                'name' => 'Teams',

                'position' => 9,
            ],
            [
                'name' => 'Subcriptions',

                'position' => 10,
            ],
            [
                'name' => 'People',

                'position' => 11,
            ],
            [
                'name' => 'Upload Spreadsheet',

                'position' => 12,
            ],
            [
                'name' => 'Blog',

                'position' => 13,
            ],
            [
                'name' => 'Comments',

                'position' => 14,
            ],
            [
                'name' => 'Sheets',

                'position' => 15,
            ],
            [
                'name' => 'Website Statistics',

                'position' => 16,
            ],
        ]);
    }
}
