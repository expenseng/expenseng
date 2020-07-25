<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Activites;

class SettingsController extends Controller
{
    //user settings page
    public function index()
    {
         $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));
        $user = Auth::user();
        return view('backend.settings.index')->with(
            [
                'user' => $user,
                'recent_activites' => $recent_activites,
                'total_activity' => $total_activity,
            ]
        );
    }
}
