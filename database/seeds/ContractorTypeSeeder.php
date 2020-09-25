<?php

use Illuminate\Database\Seeder;
use App\CompanyType;

class ContractorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyType::insert(
            [
                [
                    'name' => 'Private Contractor (Individual)'
                ],
                [
                    'name' => 'Private Contractor (Company)'
                ],
                [
                    'name' => 'Government Official'
                ],
                [
                    'name' => 'Government Parastatal'
                ]
            ]
        );
    }
}
