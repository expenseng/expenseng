<?php

namespace App\Http\Controllers;

use App\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

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
        return view('backend.cabinet.create');
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

        return view('backend.cabinet.view')
        ->with(
            [
            'cabinets' => $cabinets,
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
            'company_name' => 'required',
            'company_shortname' => 'required',
            'company_twitter' => 'required',
            'company_ceo' => 'required',
            'ceo_handle' => 'required',
            ]
        );

        $new_cabinet = new Cabinet();
        $new_cabinet->name = $request->company_name;
        $new_cabinet->shortname = $request->company_shortname;
        $new_cabinet->industry = $request->company_twitter;
        $new_cabinet->ceo = $request->company_ceo;
        $new_cabinet->twitter = $request->ceo_handle;
        $save_new_cabinet = $new_cabinet->save();

        if ($save_new_cabinet) {
            return "<script>alert('$request->cabinet_name  created Successfully');
            window.location.replace('/admin/cabinet/view')";
        } else {
            Session::flash('flash_message', 'Cannot create new Cabinet!!');
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
            'company_name' => 'required',
            'company_shortname' => 'required',
            'company_twitter' => 'required',
            'company_ceo' => 'required',
            'ceo_handle' => 'required',
            ]
        );

        $update = Cabinet::where('id', $id)->update(
            [
            'name' => $request->company_name,
            'shortname' => $request->company_shortname,
            'industry' => $request->company_twitter,
            'ceo' => $request->company_ceo,
            'twitter' => $request->ceo_handle,
            ]
        );

        if ($update) {
            echo "<script>alert(' Cabinet details edited successfully');
            window.location.replace('/admin/cabinet/view');</script>";
        } else {
            Session::flash('flash_message', ' Cabinet was not edited!');
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
        $delete = Cabinet::where('id', $id)->delete();
        if ($delete) {
            return ("<script>alert(' Cabinet member deleted successfully');
             window.location.replace('/admin/cabinet/view');</script>");
        } else {
            Session::flash('flash_message', ' Cabinet was not deleted!');
            return redirect()->back();
    
        }
    }

}
