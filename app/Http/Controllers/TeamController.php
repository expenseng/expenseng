<?php

namespace App\Http\Controllers;

use App\Teams;
use App\Activites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Contains several functions for handling teams
 *
 * @return function for corressponding operations
 */
class TeamController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage-user')) {
            return redirect(route('team.view'));
        }
       

        $team = Teams::paginate(20);
        return view('backend.team.view')->with([
            'team' => $team,
        ]);
    }

        /**
     * Display a form for creating ministries.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreateTeam()
    {
        if (Gate::denies('add')) {
            return redirect(route('team.view'));
        }
        
        $team = Teams::all();
        return view('backend.team.create')->with([
            
        ]);
    }
    /**
     * Display a listing of the team.
     *
     * @return view
     */
    public function viewTeam()
    {
        if (Gate::denies('manage')) {
            return redirect(route('home'));
        }

        $team = Teams::all();
        $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.team.view')->with([
            'team' => $team,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
        ]);
    }

    /**
     * Create  team funtion.
     * @params $request
     * @return view
     */
    public function createTeam(Request $request)
    {
        validator(
            [
            'name' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        //if no image was uploaded
        if ($request->image == '' || $request->twitter == '') {
            $new_team = new Teams();
            $new_team->name = $request->name;
            $new_team->twitter_handle = $request->twitter;
            $new_team->facebook_handle = $request->facebook;
            $new_team->instagram = $request->instagram;
            $new_team->linkedIn_handle = $request->linkedin;
            $new_team->role = $request->position;
            $new_team->avatar = $request->image;
            
            $save_new_team = $new_team->save();
            $auth = Auth::user();
            if ($save_new_team) {

            Activites::create([
            'description' => $auth->name.' added '.$request->name.' to the team members table',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);     

                Session::flash('flash_message', $request->name. ' added to teams Successfully!');
                return redirect(route('team.view'));

            } else {
                Session::flash('error_message', 'Cannot create new Team!!');
                return redirect()->back();
            }
        }


        $base_url = \URL::to('/');
        //replace spaces with dash in shortname
        $name = preg_replace('/[[:space:]]+/', '-', $request->name);

        //upload picture

        $imageName = $name .time().'.'
        .$request->image->getClientOriginalExtension();

        $upload = $request->image->move('uploads', $imageName);

        if ($upload) {
            $new_team = new Teams();
            $new_team->name = $request->name;
            $new_team->twitter_handle = $request->twitter;
            $new_team->facebook_handle = $request->facebook;
            $new_team->instagram = $request->instagram;
            $new_team->linkedIn_handle = $request->linkedin;
            $new_team->role = $request->position;
            $new_team->avatar = $base_url.'/uploads'. '/'.$imageName;
            $save_new_team = $new_team->save();
            $auth = Auth::user();
            if ($save_new_team) {
            Activites::create([
            'description' => $auth->name.' added '.$request->name.' to the team members table',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);     

      
                Session::flash('flash_message', $request->name. ' added to team Successfully!');
                return redirect(route('team.view'));

            } else {
                Session::flash('error_message', 'Cannot create new Team!!');
                return redirect()->back();
            }
        } else {
            Session::flash('error_message', 'Cannot upload image!!');
            return redirect()->back();
        }
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('team.view'));
        }
        //get the particular member details
        $team = Teams::findOrFail($id); 
        
        
    
        
        
        return view('backend.team.edit')->with(['team' => $team,
        ]);
    }

    public function editTeam(Request $request, $id)
    {
        validator(
            [
            'name' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            ]
        );
        $img_url = Teams::findOrFail($id)->avatar;
        //if image isn't changed

        if ($request->image == '' ) {
            $update = Teams::where('id', $id)->update(
                [
                'name' => $request->name,
                'twitter_handle' => $request->twitter,
                'facebook_handle' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin_handle' => $request->linkedin,
                'role' => $request->position,
                //'avatar' => $request->image,
                
                ]

            );
            $auth = Auth::user();
            if ($update) {
            Activites::create([
            'description' => $auth->name.' edited team member '.$request->name.' details',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);     
                Session::flash('flash_message', ' Member details edited successfully!');
                return redirect(route('team.view'));
            } else {
                Session::flash('error_message', ' Team Member was not edited!');
                return redirect()->back();
            }
        }
        $base_url = \URL::to('/');
        //replace spaces with dash in shortname
        $name = preg_replace('/[[:space:]]+/', '-', $request->name);

        //upload picture

        $imageName = $name .time().'.'
        .$request->image->getClientOriginalExtension();

        $upload = $request->image->move('uploads', $imageName);

        if ($upload) {
            $update = Teams::where('id', $id)->update(
                [
                'name' => $request->name,
                'twitter_handle' => $request->twitter,
                'facebook_handle' => $request->instagram,
                'instagram' => $request->instagram,
                'linkedin_handle' => $request->linkedin,
                'role' => $request->position,
                'avatar' => $base_url. '/uploads'. '/'. $imageName,
                
                ]
            );
            $auth = Auth::user();

            if ($update) {
                
            Activites::create([
            'description' => $auth->name.' edited team member '.$request->name.' details',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);     
                 Session::flash('flash_message', ' Member details edited successfully!');
                return redirect(route('team.view'));
            } else {
                Session::flash('error_message', ' Team was not edited!');
                return redirect()->back();
            }
        } else {
            Session::flash('error_message', ' Image was not uploaded!');
            return redirect()->back();
        }
    }
    /**
     * Deletes a member from Team
     *
     * @params $id
     * @return  message
     */
    public function deleteTeam($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('team.view'));
        }
         $username = DB::table('teams')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();
        $name = implode(' ', $username);
        $auth = Auth::user();
        $delete = Teams::where('id', $id)->delete();

        if ($delete) {
            Activites::create([
            'description' => $auth->name.' deleted '.$name.' from the team table',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);           

             Session::flash('flash_message', 'Team member deleted successfully!');
             return redirect(route('team.view'));
        } else {
            Session::flash('error_message', ' Team was not deleted!');
            return redirect()->back();
        }
    }
}
