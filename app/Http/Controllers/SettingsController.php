<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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

    public function ChangePassword(Request $request, $id)
    {
        if (Gate::denies('add')) {
            return redirect(route('settings.change_password'));
        }

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $validator->validate();
        $update = User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        Session::flash('flash_message', 'Password changed succesfully');
        return redirect()->back();
    }
}
