<?php

namespace App\Imports;

use App\Cabinet;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CabinetImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Cabinet|null
     */
    public function model(array $row)
    {
        return new Cabinet([
           'name'     => $row['name'],
    'twitter_handle'=> $row['twitter_handle'],
    'role'=> $row['role'],
    'avatar'=> $row['avatar'],
    'ministry_code'=> $row['ministry_code'],
        ]);
    }
}
