<?php

namespace App\Utils;

class Utils {
    public static function GetDate($days, $date)
    {
        $date = new \DateTime($date);
        $newdate = $date->sub(\DateInterval::createFromDateString($days . ' days'));
        // $back->format('y-m-d');
    
        return $newdate->format('Y-m-d');
        // dd($latestdate, $back->format('Y-m-d'));
    }
}


