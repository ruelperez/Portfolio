<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use App\Models\Review;
use App\Models\Setting;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
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

    public function submit_review(Request $request){
        try {
            // Validate form data
            $validatedData = $request->validate([
                'name'     => 'required|string|max:255',
                'job'      => 'required|string|max:255',
                'message'  => 'required|string|max:2000',
                'pic'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            ], [
                'name.required'    => 'Your name is required.',
                'job.required'     => 'Your job title is required.',
                'message.required' => 'Please write your review message.',
                'pic.image'        => 'The profile picture must be an image.',
                'pic.mimes'        => 'Only JPG and PNG formats are allowed.',
                'pic.max'          => 'The profile picture must not be larger than 2MB.',
            ]);

            if ($request->hasFile('pic')) {
                // Store in storage/app/public/images
                $get_new_file = $request->file('pic')->store('images/reviewers', 'public');

                Review::create([
                    'image' => $get_new_file,
                    'name' => $request->name,
                    'job' => $request->job,
                    'description' => $request->message,
                ]);
            }
            else{
                Review::create([
                    'image' => 'images/reviewers/default_profile.jpg',
                    'name' => $request->name,
                    'job' => $request->job,
                    'description' => $request->message,
                ]);
            }
            return to_route('home')->with('message', 'Message sent sucessfully !');
        }catch (\Exception $e){
            return to_route('home')->with('failed', 'Failed to send !');
        }

    }

}
