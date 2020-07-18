<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'firstName'=> 'Adamu',
                'lastName'=> 'Adamu',
                'ministry_id'=> 1,
                'sector_id'=>2,
                'cabinet_id'=>2,
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Olamilekan',
                'lastName'=> 'Adegbite',
                'ministry_id'=> 3,
                'sector_id'=>2,
                'cabinet_id'=>2,
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Clement',
                'lastName'=> 'Agba',
                'ministry_id'=> 5,
                'sector_id'=>2,
                'cabinet_id'=>2,
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Sunday',
                'lastName'=> 'Dare',
                'ministry_id'=> 2,
                'sector_id'=>2,
                'cabinet_id'=>2,
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Adamu',
                'lastName'=> 'Adamu',
                'ministry_id'=> 6,
                'sector_id'=>2,
                'cabinet_id'=>2,
                'position'=> 'Minister',
                'isApprove'=> 0
            ]
        ]);
    }
}
