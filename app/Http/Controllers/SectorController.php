<?php



namespace App\Http\Controllers;

use App\Ministry;
use App\Payment;
use App\Sector;
use App\Activites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class SectorController extends Controller
{
    /**
     * Display a form for creating sectors.
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
     * Display a listing of the sectors.
     *
     * @return view
     */
    public function viewSectors()
    {
        if (Gate::denies('manage')) {
            return redirect(route('home'));
        }

        $sectors = Sector::all();
        $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.sector.view')->with([
            'sectors' => $sectors,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
        ]);
    }

    public function createSector(Request $request)
    {
        validator([
            'sector_name' => 'required' ,
            
            
        ]);

        $new_sector = new Sector();
        $new_sector->name = $request->sector_name;
    
        $save_new_sector = $new_sector->save();
         
         $auth =  Auth::user();
        

        if ($save_new_sector) {
            Activites::create([
                'description' => $auth->name.' added '. $request->sector_name .' to the sector table',
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
