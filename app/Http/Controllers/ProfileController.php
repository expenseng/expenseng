<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Activites;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));
        $user = Auth::user();
        return view('backend.profile.index')->with(
            [
            'user' => $user,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            ]
        );
    }
    
    //dashboard profile page
    public function index()
    {

        if (Gate::denies('manage')) {
            return redirect(route('profile'));
        }

        $user = Auth::user();
        return view('backend.profile.user')->with(['user' => $user]);
    }
}
