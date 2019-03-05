<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        return view('dashboard.user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $atts =request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required_with:confpassword|same:confpassword',
        ]);

        //Hash::make($data['password'])
        
        $user->name = $request->name;
        $user->email = $request->email;

        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('status', 'Profile updated!');
    }
}
