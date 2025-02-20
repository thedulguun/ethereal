<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('auth.contact');
})->name('contact');

Route::get('/productpage', [App\Http\Controllers\HomeController::class, 'products']);

Route::get('/product1', function () {
    return view('pages.product1');
})->name('product1');

Auth::routes();

// Route::post('/contact', function (Request $request) {
//     $validated = $request->validate([
//         'name' => 'required|max:255',
//         'email' => 'required|email',
//         'subject' => 'required|max:255',
//         'message' => 'required',
//     ]);

//     // Save to the database
//     ContactMessage::create($validated);

//     return back()->with('success', 'Your message has been sent successfully!');
// })->name('contact.submit');

?>
