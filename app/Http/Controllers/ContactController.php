<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|max:255',
            'subject_mail' => 'required|min:4|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|min:4|max:1000',
        ]);

        $contact_email = Setting::select('contact_mail')->first()->value('contact_mail');

        Mail::to($contact_email)->send(new ContactMail(
            $request->name,
            $request->email,
            $request->subject_mail,
            $request->content
        ));

        return to_route('home')->with('message', 'Message sent sucessfully !');
    }
}
