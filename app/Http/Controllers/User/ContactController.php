<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\ContactMessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('user.contact.contact-page');
    }

    public function store(Request $request){

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Contact::create([
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        // ]);

        $contact = Contact::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Mail::to('prajapatiashwin360@gmail.com')->send(new ContactMail($request->all()));

        return redirect()->back()->with('success', 'Contact message sent successfully!');
    }
}
