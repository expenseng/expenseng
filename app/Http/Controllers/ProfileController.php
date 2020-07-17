<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $user = Auth::user();
        return view('backend.profile.index')->with(['user' => $user]);
    }
}
