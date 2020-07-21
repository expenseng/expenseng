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
        DB::table('feedbacks')->insert([
            [
                'firstName'=> 'Adamu',
                'lastName'=> 'Adamu',
                'ministry_id'=> 'Foreign Affairs',
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Olamilekan',
                'lastName'=> 'Adegbite',
                'ministry_id'=> 'Petroleum',
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Clement',
                'lastName'=> 'Agba',
                'ministry_id'=> 'Works',
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Sunday',
                'lastName'=> 'Dare',
                'ministry_id'=> 'Finance',
                'position'=> 'Minister',
                'isApprove'=> 0
            ],
            [
                'firstName'=> 'Adamu',
                'lastName'=> 'Adamu',
                'ministry_id'=> 'Power',
                'position'=> 'Minister',
                'isApprove'=> 0
            ]
        ]);
    }
}
