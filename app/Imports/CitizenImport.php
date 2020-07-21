<?php

namespace App\Imports;

use App\Citizen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitizenImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Citizen|null
     */
    public function model(array $row)
    {
        return new Citizen([
           'name'     => $row['name'],
           'email'    => $row['email'], 
           'phone'    => $row['phone'], 
           'password' => Hash::make($row['password']),
        ]);
    }
}
