<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $table = 'contractor_types';

    protected $guarded = [];

    /**
     * Define relationship to contractors 
     */
    public function contractor()
    {
        return $this->belongsTo(Company::class);
    }
}
