<?php

use App\ContractorVotes as AppContractorVotes;
use Illuminate\Database\Seeder;

class ContractorVotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppContractorVotes::insert(
            [
                [
                    'type' => 'Private Contractor (Individual)',
                    'count' => 0,
                ],
                [
                    'type' => 'Private Contractor (Company)',
                    'count' => 0
                ],
                [
                    'type' => 'Government Official',
                    'count' => 0,
                ],
                [
                    'type' => 'Government Parastatal',
                    'count' => 0,
                ],
            ]
        );
    }
}
