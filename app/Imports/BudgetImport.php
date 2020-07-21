<?php

namespace App\Imports;

use App\Budget;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BudgetImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Budject|null
     */
    public function model(array $row)
    {
        return new Budget([
           'amount'     => $row['amount'],
           'project_name'    => $row['project_name'], 
           'code'    => $row['code'], 
           'year'    => $row['year'], 
           'classification'    => $row['classification'], 
        ]);
    }
}
