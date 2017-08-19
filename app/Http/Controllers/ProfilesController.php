<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index($slug)
    {
         $user = User::where('slug', $slug)->first();
        return view('profiles.profile') -> with('user', $user);
    }

     public function edit()
    {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {
          
          $this->validate($r,[
              'country' => 'required',
              'about'    => 'required|max:255'
          ]);
         
          Auth::user()->profile()->update([
              'country' => $r->country,
              'about' =>    $r->about
          ]);
           
           if($r->hasFile('avatar'))
           {
               Auth::user()->update([
                   
                   'avatar' => $r->avatar->store('public/avatars')
               ]);
           }

         // dd(Auth::user()->profile);
          session::flash('sucess', 'profile updated');
          return redirect()->route('home')->with('flash_message', 'Profile updated successfully!');
    }
}
