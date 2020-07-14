<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ROle;
use App\Status;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

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
        //
        //$users = User::all()->with('role');
        $users = User::with(['role', 'status'])->get();
        return view('backend.users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.users.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);

        $validator->validate();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
        //
        $user = User::findOrFail($id);
        $roles = Role::select('name', 'id')->get();
        $status = Status::select('name', 'id')->get();
        return view('backend.users.edit')->with(['user' => $user, 'roles' => $roles, 'status' =>$status]);
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
        //
        if(isset($request->password)){
            $validator = Validator::make($request->all(), [ 
                'password' => ['required', 'string', 'min:8'],
            ]);
            $validator->validate();
            $update = User::where('id', $id)
                ->update(
                    [
                        'password' => Hash::make($request->password),
                    ]
                );
            Session::flash('flash_message', 'User password changed successfully!');
            return redirect()->back();
        }
        else{
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email_address' => 'sometimes|required|email|unique:users',
                'role_id' => '',
                'status_id' => '',
            ]);

            $validator->validate();
            $update = User::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    //'password' => Hash::make($request->password),
                    'role_id' => $request->role_id,
                    'status_id' => $request->status_id,
                ]
            );
            Session::flash('flash_message', 'User  updated successfully!');
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $user = User::findOrFail($id);
         $user->delete();
        Session::flash('flash_message', "User Deleted successfully" . $user);
        return redirect()->back();
    }
}
