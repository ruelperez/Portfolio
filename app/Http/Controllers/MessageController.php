<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get(); // Orders by 'created_at' descending by default
        return view('admin.messages.index', compact('messages'));
    }

}
