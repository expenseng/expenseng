<?php

namespace App\Imports;

use App\Budget;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class BudgetImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Budject|null
     */
    public function model(array $row)
    {
        return new Budget([
           'amount'     => $row[0],
           'project_name'    => $row[1], 
           'code'    => $row[2], 
           'year'    => $row[3], 
           'classification'    => $row[4], 
        ]);
    }
}
