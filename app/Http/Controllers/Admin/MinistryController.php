<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Ministry;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use App\Activites;
use Illuminate\Support\Facades\DB;


class MinistryController extends Controller
{
    /**
     * Display a form for creating ministries.
     *
     */

    public function viewCreateMinistry()
    {
        if (Gate::denies('add')) {
            return redirect(route('ministry.view'));
            Session::flash();
        }

        return view('backend.ministry.create');
    }

    /**
     * Display a listing of the ministries.
     *
     * @return view
     */
    public function viewMinistries()
    {
        if (Gate::denies('manage')) {
            return redirect(route('ministry.view'));
        }
        $ministries = Ministry::all();

        return view('backend.ministry.view')->with([
            'ministries' => $ministries,
        ]);
    }

    public function createMinistry(Request $request)
    {
        validator([
            'ministry_name' => 'required',
            'code' => 'required | number',
            'ministry_shortname' => 'required',
            'ministry_twitter' => 'required',
            'ministry_head' => 'required',
            'website' => 'required',
            'sector_id' => 'required|number',
        ]);

        $new_ministry = new Ministry();
        $new_ministry->name = $request->ministry_name;
        $new_ministry->shortname = $request->ministry_shortname;
        $new_ministry->twitter = $request->ministry_twitter;
        $new_ministry->head = $request->ministry_head;
        $new_ministry->website = $request->website;
        $new_ministry->code = $request->code;
        $new_ministry->sector_id = $request->sector_id;
        $save_new_ministry = $new_ministry->save();
         
         $auth =  Auth::user();
        $username = $request->ministry_name;

        $name = implode(' ', $username);

        if ($save_new_ministry) {
            Activites::create([
                'description' => $auth->name.' added '.$name.' to the minstries table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);

            Session::flash('flash_message', 'new ministry added successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('flash_message', ' An error occured!');
            return redirect('/admin/ministry/view');
        }
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('ministry.view'));
        }

        $details = Ministry::findOrFail($id);
        return view('backend.ministry.edit')->with(['details' => $details]);
    }

    public function editMinistry(Request $request, $id)
    {
        validator([
            'ministry_name' => 'required',
            'code' => 'required | number',
            'ministry_shortname' => 'required',
            'ministry_twitter' => 'required',
            'ministry_head' => 'required',
            'website' => 'required',
            'sector_id' => 'required|number',
        ]);
        $update = Ministry::where('id', $id)->update([
            'name' => $request->ministry_name,
            'code' => $request->code,
            'shortname' => $request->ministry_shortname,
            'twitter' => $request->ministry_twitter,
            'head' => $request->ministry_head,
            'website' => $request->website,
            'sector_id' => $request->sector_id,
        ]);
        
        $auth =  Auth::user();
        $username = DB::table('ministries')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();

        $name = implode(' ', $username);
        if ($update) {
            Activites::create([
                'description' => $auth->name.' updated '.$name.' on the minstries table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
            ]);

            Session::flash('flash_message', $auth->name.' details edited successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('flash_message', ' Cannot edit '.$auth->name.'details!');
            return redirect('/admin/ministry/view');
        }
    }

    public function deleteMinistry($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('ministry.view'));
        }

        $auth =  Auth::user();
        $username = DB::table('ministries')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();

        $name = implode(' ', $username);
        $delete = Ministry::where('id', $id)->delete();
        if ($delete) {
            Activites::create([
                'description' => $auth->name.' deleted '.$name.' from the minstries table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);
            Session::flash('flash_message', $name.' deleted successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('error_message', ' Ministry was not deleted!');
            return redirect()->back();
        }
    }
}
