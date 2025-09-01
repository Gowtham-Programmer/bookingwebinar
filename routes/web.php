<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\WebinarBookingController;
use App\Http\Controllers\WebinarController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/make-call', [SMSController::class, 'makeCall'])->name('make-call');

Route::get('/check-twilio', function () {
    return response()->json([
        'sid' => config('services.twilio.sid'),
        'token' => config('services.twilio.token') ? 'Loaded' : 'Missing',
        'from' => config('services.twilio.from'),
    ]);
});

Route::get('/debug-env', function () {
    return response()->json([
        'TWILIO_SID' => env('TWILIO_SID'),
        'TWILIO_TOKEN' => env('TWILIO_TOKEN'),
        'TWILIO_NUMBER' => env('TWILIO_NUMBER'),
    ]);
});

//Admin (Only Admin Can Manage Webinars)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('webinars', WebinarController::class)->except(['index', 'show']);
});
Route::resource('webinars', WebinarController::class)->only(['index', 'show']); 

// Booking Routes (Only Logged-in Users)
Route::post('/webinars/{webinar}/book', [WebinarBookingController::class, 'book'])
    // ->middleware('auth')
    ->name('webinars.book');

Route::get('/my-webinars', [WebinarBookingController::class, 'myWebinars'])
    ->middleware('auth')
    ->name('my.webinars');


Route::get('/test-mail', function() {
    Mail::raw('Test email works!', function($message){
        $message->to('yourtestemail@example.com')->subject('Test Mail');
    });
    return 'Mail sent!';
});
Route::get('/content', [App\Http\Controllers\ContentController::class, 'index'])->name('content.page');
// Route::get('/webinar/{webinars}', [WebinarController::class, 'show'])->name('webinars.show');
// Route::post('/webinar/{webinar}/book', [WebinarBookingController::class, 'store'])->name('webinars.book');

// Show webinar details
Route::get('/webinars/{webinar}', [WebinarController::class, 'show'])->name('webinars.show');

// Handle booking submission
// Route::post('/webinars/{webinar}/book', [WebinarBookingController::class, 'store'])->name('webinars.book');


// Show the booking form
Route::get('/book/{webinar}', [BookController::class, 'create'])->name('book.create');

// Handle booking submission
Route::post('/book/{webinar}', [BookController::class, 'store'])->name('book.store');

Route::get('/ai-chat', function () {
    return view('ai-chat'); // shows the Blade UI
});
Route::post('/ai-chat', [AIController::class, 'chat']);

Route::view('/chat', 'chat'); // for showing chat UI

// Show payment form
Route::get('/payment/{webinar}', [App\Http\Controllers\PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Process payment
Route::post('/payment/{webinar}', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.process');

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // Find or create user
    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'password' => bcrypt(str()->random(16)), // random password
            'google_id' => $googleUser->getId(),
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});
