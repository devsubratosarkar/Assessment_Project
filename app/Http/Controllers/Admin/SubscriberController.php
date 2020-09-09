<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Model\User\subscriber;
use App\Mail\Mailadmin;
use App\Mail\Mailuser;

class SubscriberController extends Controller
{
    
    public function index()
    {
        $subscribers = subscriber::all();

        return view('admin.subscriber.show',compact('subscribers'));
    }


    public function store(Request $request)
    {
        
        $this->validate($request,[

            'email' => 'required|email|unique:subscribers',

        ]);

        $subscriber = new subscriber;
            $subscriber->email    = $request->email;
            $subscriber->save();
            
            return back()->with('subscribemsg', 'Subscriber Successfully');
    }

    public function destroy($id)
    {
        $subscribers = subscriber::find($id);
    
        $subscribers->delete();

        return back()->with('subscribemsg', 'Subscriber Delete Successfully');
    }

    public function indexSendemail()
    {
        return view('admin.send_email.create');
    }

    public function sendEmail(request $request)
    {
        $user = request()->validate([

        'subject' => 'required',
        'message' => 'required'
        ]);

        $subscribers = subscriber::all();
         foreach ($subscribers as $element){
            Mail::to($element->email)->send(new Mailadmin($user));
         }

        return redirect()->back()->with('messege', 'Email send Successfully.');
    }

    public function contactEmail(request $request)
    {
        $user = request()->validate([

        'email' => 'required',
        'subject' => 'required',
        'message' => 'required'
        ]);

        Mail::to('subroo.f2119@gmail.com')->send(new Mailuser($user));

        return redirect()->back()->with('messege', 'Email send Successfully.');
    }
}
