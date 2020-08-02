<?php

namespace App\Http\Controllers;
use App\Activites;


use Analytics;
use Spatie\Analytics\Period;

class Website_Statistics_Controller extends Controller
{
    public function index()
    {
        $recent_activites = Activites::where('status', 'pending')
            ->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.website_stats.website_traffic_data')->with([
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
        ]);
    }
    public function dds()
    {
        //Retrieve Most Visited Pages
        $pages = Analytics::fetchMostVisitedPages(Period::days(1));

        //retrieve visitors and pageview data for the current day and the last fifteen days
        $visitors = Analytics:: fetchTotalVisitorsAndPageViews(Period::days(15));
        // Retrieve Total Visitors and Page Views
        $total_visitors = Analytics::fetchTotalVisitorsAndPageViews(
            Period::days(7)
        );

        // Retrieve Top Referrers
        $top_referrers = Analytics::fetchTopReferrers(Period::days(7));

        // Retrieve User Types
        $user_types = Analytics::fetchUserTypes(Period::days(7));

        //Retrieve Top Browsers
        $top_browser = Analytics::fetchTopBrowsers(Period::days(7));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        // $analyticsData = Analytics::performQuery(
        //     Period::years(1),
        //     'ga:sessions',
        //     [
        //         'metrics' => 'ga:sessions, ga:pageviews, ga:users, ga:newUsers',
        //         'dimensions' => 'ga:yearMonth',
        //     ]
        //     ga:userType
        // );
        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:userType',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:userType',
            ]
           
            );

        //  echo $data['totalsForAllResults'][0];
        // $total_users = $analyticsData->totalsForAllResults['ga:users'];
        $total_users = $analyticsData->rows[0]['0'];
        $new = $analyticsData->rows[0]['1'];

        dd($total_users.": ".$new);
    
}

}