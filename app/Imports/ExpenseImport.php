<?php

namespace App\Imports;

use App\Expense;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExpenseImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Expense|null
     */
    public function model(array $row)
    {
        return new Expense([
            'amount_spent'     => $row['amount_spent'],
            'year'    => $row['year'], 
            'month'    => $row['month'], 
            'project'    => $row['project'], 
        ]);
    }
}
