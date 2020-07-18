<?php

namespace App\Imports;

use App\Citizen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CitizenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Citizen|null
     */
    public function model(array $row)
    {
        return new Citizen([
           'name'     => $row[0],
           'email'    => $row[1], 
           'phone'    => $row[2], 
           'password' => Hash::make($row[3]),
        ]);
    }
}
