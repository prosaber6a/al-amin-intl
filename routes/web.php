<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Agents Routes
    Route::get('agents', [AgentController::class, 'index'])->name('agents.index');
    Route::post('agents', [AgentController::class, 'store'])->name('agents.store');
    Route::delete('agents/{agent}', [AgentController::class, 'destroy']);
    Route::get('agents/{agent}/edit', [AgentController::class, 'edit']);


    // Hotels Routes
    Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::delete('hotels/{hotel}', [HotelController::class, 'destroy']);
    Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit']);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
