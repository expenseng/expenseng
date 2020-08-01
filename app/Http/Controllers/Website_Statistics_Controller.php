<?php

namespace App\Http\Controllers;
use App\Activites;
use Illuminate\Http\Request;

class Website_Statistics_Controller extends Controller
{
   public function index()
    {
         $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.website_stats.website_traffic_data')->with(
            [
                'recent_activites' => $recent_activites,
                'total_activity' => $total_activity,
            ]
        );
    }

}
