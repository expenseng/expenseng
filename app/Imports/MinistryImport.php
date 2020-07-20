<?php

namespace App\Imports;

use App\Ministry;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MinistryImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Ministry|null
     */
    public function model(array $row)
    {
        return new Ministry([
        'code'      => $row[0],
        'name'      => $row[1],
        'shortname'      => $row[2],
        'twitter'     => $row[3],
        'head'     => $row[4],
        'website'     => $row[5],
        'sector_id'     => $row[6],
        ]);
    }
}
