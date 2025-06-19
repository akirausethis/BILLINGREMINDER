<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Models\Reminder;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('landing'); // Landing page
})->name('landing');

Route::get('/login', function () {
    return view('login'); // Login page
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders.index');

Route::get('/bill', function () {
    return view('bill');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/payment', [PaymentController::class, 'show']);

Route::resource("/User", UserController::class);

Route::resource('/reminders', ReminderController::class);

Route::get('/bill', [ReminderController::class, 'index']);


Route::get('/login', function () {
    return view('login'); // Login page
})->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register'); // Registration page
})->name('register.form');

Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/reminders/create', [ReminderController::class,'store'])->name('reminders.store');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::put('/profile/{id}', [UserController::class, 'updateProfile'])->name('profile.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Payment routes
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/{id}', [PaymentController::class, 'pay'])->name('payment.pay');

Route::get('/payment', [ReminderController::class, 'paymentIndex'])->name('payment.index');

Route::get('/history', [ReminderController::class, 'historyIndex'])->name('history.index');

