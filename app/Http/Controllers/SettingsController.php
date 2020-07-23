<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //user settings page
    public function index()
    {
        $user = Auth::user();
        return view('backend.settings.index')->with(['user' => $user]);
    }
}
