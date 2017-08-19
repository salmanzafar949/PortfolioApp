<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Message;
class ContactsController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function store(ContactFormRequest $r)
    {
         Message::create($r->all());
         return redirect()->back()->with('flash_message', 'Thank you. We have Recieved Your Query.!');
    }
}
