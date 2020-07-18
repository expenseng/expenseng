<?php

namespace App\Http\Controllers;
use App\Feedback;

use Illuminate\Http\Request;
class FeedbackController extends Controller
{
    
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'firstName' => 'required|min:4',
            'lastName' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        $feedback = new Feedback();
        $feedback->firstName =$request->firstName;
        $feedback->lastName =$request->lastName;
        $feedback->ministry_id =$request->ministry_id;
        $feedback->sector_id =1;
        $feedback->cabinet_id =1;
        $feedback->isApprove =1;
        $feedback->save();
        
        return redirect('/')->with('success','Cabinet Posted! Thanks!');
    }
}
