<?php

namespace App\Imports;

use App\Sector;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SectorImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Sector|null
     */
    public function model(array $row)
    {
        return new Sector([
           'name'     => $row[0],
           
        ]);
    }
}
