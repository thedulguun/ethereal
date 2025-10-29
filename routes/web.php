<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilePhotoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/image', function () {
    return view('pages.upload');
})->name('upload');

Route::post('savedData', [HomeController::class, 'saveProduct'])->name('uploadData');

Route::get('/contact', function () {
    return view('auth.contact');
})->name('contact');

Route::post('/contact', ContactController::class)->name('contact.send');

Route::get('/productpage', [App\Http\Controllers\HomeController::class, 'products']);

Route::get('/product/{id}', [HomeController::class, 'detailProduct'])->name('product1');

Route::get('/storage/{path}', [ProfilePhotoController::class, 'show'])
    ->where('path', '.*')
    ->name('storage.files.show');

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});

Route::redirect('/home', '/account')->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [AccountController::class, 'edit'])->name('account.edit');

    Route::get('/account', function () {
        return redirect()->route('account.edit');
    });

    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});

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

