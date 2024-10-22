<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Semua halaman
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events', [EventController::class, 'show'])->name('events.show');

    Route::resource('events', EventController::class);
});

// Group untuk profile yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
