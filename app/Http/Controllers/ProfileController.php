<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $user = Auth::user();
        return view('backend.profile.index')->with(['user' => $user]);
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
