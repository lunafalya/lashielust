<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Simpan pesan dari user
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    // Tampilkan pesan ke admin
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.message', compact('messages'));
    }

    public function show()
{
    $user = Auth::user();
    return view('home.contactus', compact('user'));
}
}
