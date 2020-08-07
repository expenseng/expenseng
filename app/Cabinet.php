<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Cabinet extends Model
{

    use Searchable;
    protected $fillable = [
        'name', 
        'twitter_handle',
        'role',
        'avatar', 
        'ministry_code', 
    ];
    
    public function ministries()
    {
        return $this->belongsTo(Ministry::class, 'code', 'ministry_code');
    }

    /**
     * Load realtionships into the search
     * results
     */
    public function toSearchableArray(){
        $array = $this->toArray();

        $array = $this->transform($array);

        $array['ministry'] = $this->ministries;

        return $array;
    }
}
