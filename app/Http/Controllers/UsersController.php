<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    //
    public function index()
    {
        //   $users = User::all();
        //$users = User::simplePaginate();
        $users = User::paginate(20);
       return view('users.users', compact('users'));
        //return $users;
    }
}
