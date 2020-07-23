<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Activites;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    // display all expenses
    public function index(Request $request)
    {
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }
        $recent_activites = Activites::orderBY('id', 'DESC')
            ->limit(5)
            ->get();
        $total_activity = count(Activites::all());
        $count = 0;
        $subscribe = Subscription::paginate(10);
        return view('backend.subscription.index')->with([
            'subscribe' => $subscribe,
            'count' => $count,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
        ]);
    }

    /**
     * Create a new cabinet view.
     *
     * @return view
     */
    public function create()
    {
        if (Gate::denies('add')) {
            return redirect(route('subscribe.view'));
        }

        return view('backend.subscription.create');
    }

    /**
     * Create  cabinets funtion.
     * @params $request
     * @return view
     */
    public function createSub(Request $request)
    {
        validator([
            'name' => 'required',
            'email' => 'required',
            'sub_type' => 'required',
        ]);

        $new_subscription = new Subscription();
        $new_subscription->name = $request->name;
        $new_subscription->email = $request->email;
        $new_subscription->subscription_type = $request->sub_type;

        $save_new_subscription = $new_subscription->save();

        if ($save_new_subscription) {
            Activites::create([
                'description' =>
                    $request->name . ' subscribed to recieve latest updates',
            ]);
            Session::flash(
                'flash_message',
                $request->name . ' added to Subscription Successfully!'
            );
            return redirect(route('subscribe.view'));
        } else {
            Session::flash('flash_message', 'Cannot create new Subscription!!');
            return redirect()->back();
        }
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('subscribe.view'));
        }

        $details = Subscription::findOrFail($id);
        return view('backend.subscription.edit')->with(['details' => $details]);
    }

    public function editSub(Request $request, $id)
    {
        validator([
            'name' => 'required',
            'email' => 'required',
            'sub_type' => 'required',
        ]);

        $update = Subscription::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'subscription_type' => $request->sub_type,
        ]);

        if ($update) {
            Activites::create([
                'description' =>
                    $request->name . ' details were edited',
            ]);
            Session::flash(
                'flash_message',
                ' Subscription details edited successfully!'
            );
            return redirect(route('subscribe.view'));
        } else {
            Session::flash('flash_message', ' Subscription was not edited!');
            return redirect()->back();
        }
    }

    /**
     * Deletes a member from Subscription
     *
     * @params $id
     * @return  message
     */
    public function deleteSub($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('subscribe.view'));
        }

        $delete = Subscription::where('id', $id)->delete();

        if ($delete) {
            Activites::create([
                'description' => 'Admin deleted a subscriber',
            ]);
            Session::flash(
                'flash_message',
                ' Subscription deleted successfully!'
            );
            return redirect(route('subscribe.view'));
        } else {
            Session::flash('flash_message', ' Subscription was not deleted!');
            return redirect()->back();
        }
    }
}
