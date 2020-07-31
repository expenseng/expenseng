<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Sector;
use Illuminate\Support\Facades\Auth;
use App\Activites;
use Illuminate\Support\Facades\DB;


class SectorController extends Controller
{
    /**
     * Display a form for creating sector.
     *
     */

    public function viewCreateSector()
    {
        if (Gate::denies('add')) {
            return redirect(route('sector.view'));
            Session::flash();
        }

        return view('backend.sector.create');
    }

    /**
     * Display a listing of the sector.
     *
     * @return view
     */
    public function viewSectors()
    {
        if (Gate::denies('manage')) {
            return redirect(route('sector.view'));
        }
        $sectors = Sector::all();

        return view('backend.sector.view')->with([
            'sectors' => $sectors,
        ]);
    }

    public function createSector(Request $request)
    {
        validator([
            'sector_name' => 'required',
            
        ]);

        $new_sector = new Sector();
        $new_sector->name = $request->sector_name;
        
        $save_new_sector = $new_sector->save();
         
         $auth =  Auth::user();
        $username = $request->sector_name;

        $name = implode(' ', $username);

        if ($save_new_sector) {
            Activites::create([
                'description' => $auth->name.' added '.$name.' to the sectors table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);

            Session::flash('flash_message', 'new sector added successfully!');
            return redirect('/admin/sector/view');
        } else {
            Session::flash('flash_message', ' An error occured!');
            return redirect('/admin/sector/view');
        }
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('sector.view'));
        }

        $details = Sector::findOrFail($id);
        return view('backend.sector.edit')->with(['details' => $details]);
    }

    public function editSector(Request $request, $id)
    {
        validator([
            'sector_name' => 'required',
            
        ]);
        $update = Sector::where('id', $id)->update([
            'name' => $request->sector_name,
        ]);
        
        $auth =  Auth::user();
        $username = DB::table('sectors')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();

        $name = implode(' ', $username);
        if ($update) {
            Activites::create([
                'description' => $auth->name.' updated '.$name.' on the sectors table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
            ]);

            Session::flash('flash_message', $auth->name.' details edited successfully!');
            return redirect('/admin/sector/view');
        } else {
            Session::flash('flash_message', ' Cannot edit '.$auth->name.'details!');
            return redirect('/admin/sector/view');
        }
    }

    public function deleteSector($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('sector.view'));
        }

        $auth =  Auth::user();
        $username = DB::table('sectors')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();

        $name = implode(' ', $username);
        $delete = Sector::where('id', $id)->delete();
        if ($delete) {
            Activites::create([
                'description' => $auth->name.' deleted '.$name.' from the sector table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);
            Session::flash('flash_message', $name.' deleted successfully!');
            return redirect('/admin/sector/view');
        } else {
            Session::flash('error_message', ' Sector was not deleted!');
            return redirect()->back();
        }
    }
}
