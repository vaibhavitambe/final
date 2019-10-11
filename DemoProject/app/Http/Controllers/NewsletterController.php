<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('subscriber.form');
    }

    public function store(Request $request)
    {
        if(!Newsletter::isSubscribed($request->user_email) ) 
        {
           
             Newsletter::subscribe($request->user_email);
            return redirect('newsletter')->with('message_success','Thanks for subscribing');
        }
        return redirect('newsletter')->with('message_error','You are already subscribe');
    }
}
