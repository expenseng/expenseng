<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ministry;
use App\Payment;

class MinistryController extends Controller
{
     /**
     * Display a form for creating ministries.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewCreateMinistry()
    {
        return view('backend.ministry.create');
    }

    /**
     * Display a listing of the ministries.
     *
     * @return view
     */
    public function viewMinistries()
    {
        $ministries = Ministry::all();

        return view('backend.ministry.view')->with(['ministries' => $ministries]);
    }

    public function createMinistry(Request $request)
    {
        validator(
            [
                'ministry_name' => 'required',
                'code' => 'required | number',
                'ministry_shortname' => 'required',
                'ministry_twitter' => 'required',
                'ministry_head' => 'required',
                'website' => 'required',
                'sector_id' => 'required|number'
            ]
        );

        $new_ministry = new Ministry();
        $new_ministry->name = $request->ministry_name;
        $new_ministry->shortname = $request->ministry_shortname;
        $new_ministry->twitter = $request->ministry_twitter;
        $new_ministry->head = $request->ministry_head;
        $new_ministry->website = $request->website;
        $new_ministry->code = $request->code;
        $new_ministry->sector_id = $request->sector_id;
        $save_new_ministry = $new_ministry->save();

        if ($save_new_ministry) {
            echo ("<script>alert('New ministry created successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            echo ("<script>alert('Cannot create New ministry'); 
            window.location.replace('/admin/ministry/create');</script>");
        }
    }

    public function showEditForm($id)
    {
        $details = Ministry::findOrFail($id);
        return view('backend.ministry.edit')->with(['details' => $details]);
    }

    public function editMinistry(Request $request, $id)
    {
        validator(
            [
                'ministry_name' => 'required',
                'code' => 'required | number',
                'ministry_shortname' => 'required',
                'ministry_twitter' => 'required',
                'ministry_head' => 'required',
                'website' => 'required',
                'sector_id' => 'required|number'
            ]
        );
        $update = Ministry::where('id', $id)
        ->update(
            [
                'name' => $request->ministry_name,
                'code' => $request->code,
                'shortname' => $request->ministry_shortname,
                'twitter' => $request->ministry_twitter,
                'head' => $request->ministry_head,
                'website' => $request->website,
                'sector_id' => $request->sector_id
            ]
        );
        if ($update) {
            echo ("<script>alert(' Ministry details edited successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            echo ("<script>alert('Cannot edit ministry detail'); 
            window.location.replace('/admin/ministry/edit/$id');</script>");
        }
    }

    public function deleteMinistry($id){
        $delete = Ministry::where('id', $id)->delete();
        if ($delete) {
            echo ("<script>alert(' Ministry details deleted successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            echo ("<script>alert('Cannot Delete ministry detail'); 
            window.location.replace('/admin/ministry/view');</script>");
        }
    }
}
