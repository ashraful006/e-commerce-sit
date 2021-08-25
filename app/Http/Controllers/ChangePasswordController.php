<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class ChangePasswordController extends Controller
{
    //

    public function ChangePasswordPage(){


        return view('admin.body.change_password');
    }

    public function Update(Request $request){

        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $old_password = Auth::user()->password;

        if(Hash::check($request->old_password, $old_password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Updated');
        }
        else{
            return redirect()->back()->with('error','Current password you have given is invalid');
        }
        


    }
}
