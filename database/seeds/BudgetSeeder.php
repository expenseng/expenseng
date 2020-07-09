<?php

use App\Budget;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Budget::create(
            [
                'amount' => "5236425478125.26",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "376566119970.03",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "236425478125.60",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "326,425,478,125.26",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "5,236,425,478,125.26",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            // Defence
            [
                'amount' => "376566119970.03",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "236425478125.60",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "326,425,478,125.26",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "755324373982.63",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            // Education
            [
                'amount' => "1009660430935.43",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "236425478125.60",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "326,425,478,125.26",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "755324373982.63",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
            // Health
            [
                'amount' => "371200595611.349",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "326,425,478,125.26",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "755324373982.63",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            //Housing and Community Amenities
            [
                'amount' => "371200595611.349",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "23903492321.423",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "326,425,478,125.26",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "755324373982.63",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
        );

    }
}
