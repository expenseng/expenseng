<?php

namespace App\Imports;

use App\Cabinet;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CabinetImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Cabinet|null
     */
    public function model(array $row)
    {
        return new Cabinet([
           'name'     => $row[0],
    'twitter_handle'=> $row[0],
    'role'=> $row[0],
    'avatar'=> $row[0],
    'ministry_code'=> $row[0],
        ]);
    }
}
