<?php

namespace App\Http\Controllers;

use App\Cabinet;
use App\Ministry;
use App\Activites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

/**
 * Contains several functions for handling cabinets
 *
 * @return function for corressponding operations
 */
class CabinetController extends Controller
{
    //
    /**
     * Create a new cabinet view.
     *
     * @return view
     */
    public function create()
    {
        if (Gate::denies('add')) {
            return redirect(route('cabinet.view'));
        }
        $ministry_codes = Ministry::all('code');
        return view('backend.cabinet.create')
        ->with(['ministry_codes' => $ministry_codes]);
    }

    /**
     * Display a lists of the cabinets.
     * @return view
     */
    public function viewCabinets()
    {
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }

        $cabinets = Cabinet::all();
        $recent_activites = Activites::orderBY('id', 'DESC')
            ->limit(5)
            ->get();
        $total_activity = count(Activites::all());
        return view('backend.cabinet.view')
        ->with(
            [
            'cabinets' => $cabinets,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0
            ]
        );
    }

    /**
     * Create  cabinets funtion.
     * @params $request
     * @return view
     */
    public function createCabinet(Request $request)
    {
        validator(
            [
            'name' => 'required',
            'twitter' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required',
            ]
        );

        //if no image was uploaded
        if ($request->image == '' || $request->twitter == '') {
            $new_cabinet = new Cabinet();
            $new_cabinet->name = $request->name;
            $new_cabinet->twitter_handle = $request->twitter;
            $new_cabinet->role = $request->position;
            $new_cabinet->avatar = $request->image;
            $new_cabinet->ministry_code = $request->code;
            $save_new_cabinet = $new_cabinet->save();

            if ($save_new_cabinet) {
                Activites::create([
                'description' =>
                'Admin added '.$request->name.'as a new cabinet member',

            ]);
                Session::flash('flash_message', $request->name. ' added to cabinet Successfully!');
                return redirect(route('cabinet.view'));

            } else {
                Session::flash('flash_message', 'Cannot create new Cabinet!!');
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
            $new_cabinet = new Cabinet();
            $new_cabinet->name = $request->name;
            $new_cabinet->twitter_handle = $request->twitter;
            $new_cabinet->role = $request->position;
            $new_cabinet->avatar = $base_url.'/uploads'. '/'.$imageName;
            $new_cabinet->ministry_code = $request->code;
            $save_new_cabinet = $new_cabinet->save();

            if ($save_new_cabinet) {
                 Activites::create([
            'description' =>
                'Admin added '.$request->name.' as a new cabinet member',

            ]);

                Session::flash('flash_message', $request->name. ' added to cabinet Successfully!');
                return redirect(route('cabinet.view'));

            } else {
                Session::flash('flash_message', 'Cannot create new Cabinet!!');
                return redirect()->back();
            }
        } else {
            Session::flash('flash_message', 'Cannot upload image!!');
            return redirect()->back();
        }
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('cabinet.view'));
        }

        $details = Cabinet::findOrFail($id);
        return view('backend.cabinet.edit')->with(['details' => $details]);
    }

    public function editCabinet(Request $request, $id)
    {
        validator(
            [
            'name' => 'required',
            'twitter' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required',
            ]
        );
        $img_url = Cabinet::findOrFail($id)->avatar;
        //if image isn't changed

        if ($request->image == '' ) {
            $update = Cabinet::where('id', $id)->update(
                [
                'name' => $request->name,
                'twitter_handle' => $request->twitter,
                'role' => $request->position,
                //'avatar' => $request->image,
                'ministry_code' => $request->code,
                ]

            );

            if ($update) {
             Activites::create(['description' =>'edited cabinet member '.$request->name.' details',]);

                Session::flash('flash_message', ' Cabinet details edited successfully!');
                return redirect(route('cabinet.view'));
            } else {
                Session::flash('flash_message', ' Cabinet was not edited!');
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

            $update = Cabinet::where('id', $id)->update(
                [
                'name' => $request->name,
                'twitter_handle' => $request->twitter,
                'role' => $request->position,
                'avatar' => $base_url. '/uploads'. '/'. $imageName,
                'ministry_code' => $request->code,
                ]
            );

            if ($update) {
                Activites::create(['description' =>'edited cabinet member '.$request->name.' details',]);
                 Session::flash('flash_message', ' Cabinet details edited successfully!');
                return redirect(route('cabinet.view'));
            } else {
                Session::flash('flash_message', ' Cabinet was not edited!');
                return redirect()->back();
            }
        } else {
            Session::flash('flash_message', ' Image was not uploaded!');
            return redirect()->back();
        }
    }
    /**
     * Deletes a member from cabinet
     *
     * @params $id
     * @return  message
     */
    public function deleteCabinet($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('cabinet.view'));
        }
         $username = DB::table('cabinets')->where('id', $id)->pluck('name')->toArray();
        $name= implode(" ", $username);

        $delete = Cabinet::where('id', $id)->delete();
        if ($delete) {
           
            Activites::create(['description' =>'Admin deleted '.$name.' from the cabinet table']);

             Session::flash('flash_message', 'Cabinet member deleted successfully!');
             return redirect(route('cabinet.view'));
        } else {
            Session::flash('flash_message', ' Cabinet was not deleted!');
            return redirect()->back();

        }
    }

}
