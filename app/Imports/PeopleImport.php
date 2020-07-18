<?php

namespace App\Imports;

use App\People;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PeopleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return People|null
     */
    public function model(array $row)
    {
        return new People([
           'name'=> $row[0],
            'position' => $row[1],
           'company_id'=> $row[2],
           'twitter'    => $row[3], 
           'facebook'    => $row[4], 
           'linkedin'    => $row[5],
           'avatar'    => $row[6],  
           'email'    => $row[7], 

        ]);
    }
}
