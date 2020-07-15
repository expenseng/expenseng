<?php

use App\Budget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        DB::table('budgets')->insert([
            [
                'amount' => "523642547812526",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "37656611997003",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "23642547812560",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "32642547812526",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "523642547812526",
                'project_name' => "General Public Service",
                'code' => "1-GPS",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "37656611997003",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "23642547812560",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "32642547812526",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "75532437398263",
                'project_name' => "Defence",
                'code' => "2-Def",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "100966043093543",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "23642547812560",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "32642547812526",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "75532437398263",
                'project_name' => "Education",
                'code' => "3-E",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "371200595611349",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2016",
                'classification' => "Functions of Government",
            ],
            [
                "amount" => "2312920831232",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "32642547812526",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "75532437398263",
                'project_name' => "Health",
                'code' => "7-H",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "371200595611349",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2020",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "23903492321423",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2017",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "32642547812526",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2018",
                'classification' => "Functions of Government",
            ],
            [
                'amount' => "75532437398263",
                'project_name' => "Housing and Community Amenities",
                'code' => "HCA",
                'year' => "2019",
                'classification' => "Functions of Government",
            ],
        ]);
    }
}
