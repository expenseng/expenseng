<?php

namespace App\Imports;

use App\Company;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Company|null
     */
    public function model(array $row)
    {
        return new Company([
           'name'     => $row[0],
           'shortname'     => $row[1],
           'industry'    => $row[2], 
           'ceo' => $row[3],
           'twitter' =>$row[4],
        ]);
    }
}
