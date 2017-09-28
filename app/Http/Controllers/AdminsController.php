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
}
