<?php

namespace App\Http\Controllers;
use App\Activites;


use Analytics;
use Spatie\Analytics\Period;

class Website_Statistics_Controller extends Controller
{
    public function index()
    {
         $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:userType',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:userType',
            ]
           
            );
        $total_users = $analyticsData->totalsForAllResults['ga:users'];
        $new_users = $analyticsData->rows[0]['1'];


        $recent_activites = Activites::where('status', 'pending')
            ->orderBY('id', 'DESC')
            ->limit(7)
            ->get();    
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.website_stats.website_traffic_data')->with([
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'total_users' => $total_users,
            'new_users' => $new_users,
        ]);
    }

}