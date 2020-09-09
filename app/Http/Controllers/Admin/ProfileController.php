<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\admin;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('admin.profile.create');
    }

    public function passwordUpdate(Request $request)
    {
    	
    $this->validate($request, [
 
        'current_password' => 'required',
        'newpassword' => 'required',
        ]);
 
 
 
       $hashedPassword = Auth::user()->password;
 
       if (\Hash::check($request->current_password , $hashedPassword )) {
 
         if (!\Hash::check($request->newpassword , $hashedPassword)) {
 
              $users =admin::find(Auth::user()->id);
              $users->password = bcrypt($request->newpassword);
              admin::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
 
              session()->flash('messege','password updated successfully');
              return redirect()->back();
            }
 
            else{
                  session()->flash('messege','new password can not be the old password!');
                  return redirect()->back();
                }
 
           }
 
          else{
               session()->flash('messege','old password doesnt matched ');
               return redirect()->back();
             }
 
       }

     public function profileIndex()
     {
      $admins = Auth::guard('admin')->user();

      return view('admin.profile.show',compact('admins'));
     }

     public function profileUpdate(Request $request)
      {
          $this->validate($request,[

          'name' => 'required',
          'email' => 'required|email',

      ]);

      $admin = admin::first();
          $admin->name = $request->name;
          $admin->email = $request->email;
          $admin->update();
          
          return redirect()->back()->with('messege', 'Admin Update Successfully');
      }
}
