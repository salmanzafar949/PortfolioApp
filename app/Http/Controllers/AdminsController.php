<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Admin;
class AdminsController extends Controller
{
    //
    public function index()
    {
          return view('Admins.admin');
    }

    public function store()
    {

    }

    public function login(Request $r)
    {
        // $admin = Admin::where('email', $r->email);
        
        $users = User::paginate(20);
        //return $r->all();
        return view ('Admins.Adashboard', compact('users'));
    }

    public function edit($id)
    {
       
        $user = User::findOrFail($id);
        return view('Admins.Edit', compact('user'));
        //return $user;
    }

    public function update(Request $r, $id)
    {
        //return $r->all();
         $user = User::findOrFail($id);
         $user->update($r->all());
         return "Info updated";
         //return $user;
        // if($user)
        // {
              
        // }
        // else
        // {
        //     return "Error Not found What you are Looking for";
        // }
        //   //return $user;
    }

    public function delete($id)
    {
        
        $user = User::findOrFail($id);
        $user -> delete();
        return "Deleted";
       // return redirect()->route('admin-login')->with('flash_message', 'User deleted!');
    }
}
