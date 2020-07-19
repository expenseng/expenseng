<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Cabinet;
class FeedbackController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'firstName' => 'required|min:4',
            'lastName' => 'required',
        ]);

        

        $feedback = new Feedback();
        $feedback->firstName =$request->firstName;
        $feedback->lastName =$request->lastName;
        $feedback->ministry_id =$request->ministry_id;
        $feedback->position ='Minister';
        $feedback->isApprove =1;

        $feedback->save();

        Session::flash('flash_message', 'A new Cabinet member has been created!');
        Session::flash('alert-class', 'alert-info');
        // $request->session()->flash('status', 'Cabinet was Posted!');
        return redirect('/')->with('success','Cabinet member  Posted Succesfully!');
    }

    public function approve(Request $request, $id)
    {
        $feedback = Feedback::where('id', $id)->where('isApprove', 0)->update(['isApprove'=>1]);
        
        $feebacks = Feedback::find($id);
        $cabinet = new Cabinet();
        $cabinet->name = $feedbacks->firstName .' '.$feedbacks->lastName;
        $cabinet->twitter_handle = '';
        $cabinet->role = '';
        $cabinet->ministry_code =12;
        $cabinet->save();
        // return redirect('/admin/dashboard')->with('success','Cabinet Member Approved');
        
        if($request->session()->has('status')){
            $request->session()->all();
        }
        return redirect()->route('dashboard')->with('success','Cabinet Member Approved');
    }
    
    public function ignore(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        
        return redirect()->route('dashboard')->with('success','Cabinet Member Ignored');
        // return redirect('/admin/dashboard')->with('success','Cabinet Member Ignored');
    }

}
