<?php

namespace App\Imports;

use App\Payment;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Payment|null
     */
    public function model(array $row)
    {
        return new Payment([
    'payment_no'	     => $row[0],
    'payment_code'     => $row[1],
        'organization'      => $row[2],
            'beneficiary'     => $row[3],
                'amount'      => $row[4],
                    	'description'     => $row[5],
        ]);
    }
}
