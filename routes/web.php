<?php
use App\Models\ContactMessage;
use Illuminate\Http\Request;


Route::get('/', function() {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'subject' => 'required|max:255',
        'message' => 'required',
    ]);

    // Save to the database
    ContactMessage::create($validated);

    return back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');

?>