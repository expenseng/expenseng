<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ministry extends Model
{
    use Searchable;

    protected $fillable = [
        'code',
        'name',
        'shortname',
        'twitter',
        'head',
        'website',
        'sector_id'
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function cabinet()
    {
        return $this->hasMany(Cabinet::class, 'ministry_code', 'code');
    }

    /**
     * Helper methods
    */
    public function shortname()
    {
        /***
         * Return only the first word if the word is greater than 10
         * Return the entire word in lowercase with spaces removed otherwise
         */
        return strlen($this->shortname) > 10 ?
                strtolower(explode(" ", $this->shortname)[0]) : strtolower(str_replace(" ", "-", $this->shortname));
    }

    public function getRouteKeyName()
    {
        return 'shortname';
    }
}
