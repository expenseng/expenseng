<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorVotes extends Model
{
    protected $table = "contractor_votes";
    protected $guarded = [];

    /***
     * Relationship to fetch the full details
     * of the voted contractor type
     */
    public function type()
    {
        return $this->belongsTo(CompanyType::class, 'type', 'name');
    }
}
