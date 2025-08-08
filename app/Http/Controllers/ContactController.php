<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use App\Models\Setting;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject_mail'],
            'message' => $validated['content']
        ]);

        return to_route('home')->with('message', 'Message sent sucessfully !');
    }
}
