<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\User;

  
class ChangePasswordController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/auth/passwords/changePassword');
    } 


    public function updatePassword(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            // return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            // Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            // return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }
         $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|',
            'new_confirm_password' => 'required_with::new_password|same:new_password||string|min:8|',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return view('/pages/home');
    }
}