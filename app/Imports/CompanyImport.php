<?php

namespace App\Imports;

use App\Company;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanyImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Company|null
     */
    public function model(array $row)
    {
        return new Company([
           'name'     => $row['name'],
           'shortname'     => $row['shortname'],
           'industry'    => $row['industry'], 
           'ceo' => $row['ceo'],
           'twitter' =>$row['twitter'],
        ]);
    }
}