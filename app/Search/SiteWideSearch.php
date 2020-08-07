<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;

class SiteWideSearch extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        \App\Ministry::class,
        \App\Cabinet::class,
        \App\Company::class,
        \App\Budget::class,
        \App\Payment::class
    ];
}
