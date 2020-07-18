<?php

namespace App\Imports;

use App\Expense;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ExpenseImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Expense|null
     */
    public function model(array $row)
    {
        return new Expense([
            'amount_spent'     => $row[0],
            'year'    => $row[1], 
            'month'    => $row[2], 
            'project'    => $row[3], 
        ]);
    }
}
