<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Status;
use App\Activites;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        return view('backend.profile.index')->with(['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->get(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required',
            'gender' => ['required','string','max:20'],
            'image' => 'required',
            'dob' => 'required',
            'role_id' => '',
            'status_id' => '',
        ]);

        $validator->validate();

        $user = User::create([
            'name' => $request->name,
            
        ]);

        $role_id = $request->role_id;
        $user->roles()->attach($role_id);
        $auth = Auth::user();

        Activites::create([
            'description' =>$auth->name.' Added ' . $request->name . ' to the users table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

        ]);

        Session::flash('flash_message', 'New User successfully added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('manage-user')) {
            return redirect(route('profile'));
        }

        $user = User::findOrFail($id);
        
        return view('backend.profile.edit')->with([
            'user' => $user,
            
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => '',
            'gender' => ['','string','max:20'],
            'image' => '',
            'date_of_birth' => '',
            
        ]);

        $validator->validate();

        if (Gate::denies('add')) {
            return redirect(route('profile'));
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'image' => $request->image,
            'date_of_birth' => $request->date_of_birth,
            
        ]);

        
         User::where('id', $id)->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'image' => $request->image,
                'date_of_birth' => $request->date_of_birth,
              
            ]);
            $auth = Auth::user();
            Activites::select([
                'description' =>$auth->name.' updated user '. $request->name .' details',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

                
            ]);


        Session::flash('flash_message', 'User updated successfully!');
        return redirect(route('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //checkcsd
        if (Gate::denies('delete')) {
            return redirect(route('profile'));
        }
        $username = DB::table('users')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();
        $name = implode(' ', $username);
        $auth = Auth::user();
        Activites::create([
            'description' => $auth->name.' removed '.$name.' from the users table',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);

        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        Session::flash('flash_message', 'User Deleted successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request, $id)
    {
        if (Gate::denies('add')) {
            return redirect(route('profile.view'));
        }

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $validator->validate();
        $update = User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        Session::flash('flash_message', 'User password changed successfully!');
        return redirect()->back();
    }
}
