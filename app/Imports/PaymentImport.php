<?php

namespace App\Imports;

use App\Payment;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PaymentImport implements ToModel
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
                    'payment_date'     => $row[5],
                    	'description'     => $row[6],
        ]);
    }
}
