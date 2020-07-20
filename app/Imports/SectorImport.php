<?php

namespace App\Imports;

use App\Sector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class SectorImport implements ToModel,WithHeadingRow
// ,WithValidation
{
    /**
     * @param array $row
     *
     * @return Sector|null
     */
    public function model(array $row)
    {
        return new Sector([
           'name'     => $row['name'],
           
        ]);
    }

   
}
