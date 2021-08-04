<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','User logged out');
    }
}