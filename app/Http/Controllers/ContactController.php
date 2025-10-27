<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1) Validate input (will auto-redirect back with errors if invalid)
        $data = $request->validate([
            'name'    => ['required','string','max:120'],
            'email'   => ['required','email'],
            'message' => ['required','string','max:5000'],
        ]);

        // 2) Determine where to send the email (your inbox from .env)
        $admin = config('mail.admin_address');

        // 3) Send the email using a Mailable class (defined below)
        Mail::to($admin)->send(new ContactMessageMail($data));

        // 4) Redirect back with a friendly success message
        return back()->with('status', 'Thanks! Your message was sent.');
    }
}
