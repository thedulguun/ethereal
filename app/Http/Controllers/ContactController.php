<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle an incoming contact message submission.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $ownerAddress = config('mail.owner_address');

        if (empty($ownerAddress)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Unable to send message: owner email address is not configured.']);
        }

        try {
            Mail::to($ownerAddress)->send(new ContactMessage(
                $validated['name'],
                $validated['email'],
                $validated['message']
            ));
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->withErrors(['email' => 'We could not send your message right now. Please try again later.']);
        }

        return back()->with('status', 'Thank you for reaching out! Your message has been sent.');
    }
}
