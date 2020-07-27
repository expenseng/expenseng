<?php

namespace App\Http\Controllers\Admin;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage-user')) {
            return redirect(route('ministry.view'));
        }
           $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        $users = User::all();
        return view('backend.users.index')->with([
            'users' => $users,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add')) {
            return redirect(route('users.view'));
        }

        $roles = Role::select('name', 'id')->get();
        $status = Status::select('name', 'id')->get();
        return view('backend.users.create')->with([
            'roles' => $roles,
            'status' => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => '',
            'status_id' => '',
            'phone_number' => '',
            'gender' => '',
        ]);

        $validator->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'status_id' => $request->status_id,
            'password' => Hash::make($request->password),
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
        return redirect(route('users.view'));
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
            return redirect(route('users.view'));
        }

        $user = User::findOrFail($id);
        $roles = Role::all();
        $status = Status::select('name', 'id')->get();
        return view('backend.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'status' => $status,
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
            'email_address' => 'sometimes|required|email|unique:users',
            'role_id' => '',
            'status_id' => '',
            'phone_number' => [],
            'gender' => [],
        ]);

        $validator->validate();

        if (Gate::denies('add')) {
            return redirect(route('users.view'));
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status_id' => $request->status_id,
        ]);

        DB::table('role_user')
            ->where('id', $id)
            ->update([
                'role_id' => $request->role_id,
            ]);
         User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
            ]);
            $auth = Auth::user();
            Activites::create([
                'description' =>$auth->name.' updated user '. $request->name .' details',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

                
            ]);


        Session::flash('flash_message', 'User updated successfully!');
        return redirect(route('users.view'));
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
            return redirect(route('users.view'));
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
            return redirect(route('users.view'));
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
