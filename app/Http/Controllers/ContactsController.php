<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function store(ContactFormRequest $r)
    {
         return $r->all();
    }
}
