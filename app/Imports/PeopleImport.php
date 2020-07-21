<?php

namespace App\Imports;

use App\People;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeopleImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return People|null
     */
    public function model(array $row)
    {
        return new People([
           'name'=> $row['name'],
            'position' => $row['position'],
           'company_id'=> $row['company_id'],
           'twitter'    => $row['twitter'], 
           'facebook'    => $row['facebook'], 
           'linkedin'    => $row['linkedin'],
           'avatar'    => $row['avatar'],  
           'email'    => $row['email'], 

        ]);
    }
}
