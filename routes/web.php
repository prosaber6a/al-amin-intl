<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PilgrimController;

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

    // Flights Routes
    Route::get('flights', [FlightController::class, 'index'])->name('flights.index');
    Route::post('flights', [FlightController::class, 'store'])->name('flights.store');
    Route::delete('flights/{flight}', [FlightController::class, 'destroy']);
    Route::get('flights/{flight}/edit', [FlightController::class, 'edit']);

    // Package Routes
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::post('packages', [PackageController::class, 'store'])->name('packages.store');
    Route::delete('packages/{package}', [PackageController::class, 'destroy']);
    Route::get('packages/{package}/edit', [PackageController::class, 'edit']);
    Route::get('packages/hotel-flight-list', [PackageController::class, 'hotelFlightList']);


    // Group Routes
    Route::get('groups', [GroupController::class, 'index'])->name('groups.index');
    Route::post('groups', [GroupController::class, 'store'])->name('groups.store');
    Route::delete('groups/{group}', [GroupController::class, 'destroy']);
    Route::get('groups/{group}/edit', [GroupController::class, 'edit']);

    // Pilgrim Routes
    Route::get('pilgrims', [PilgrimController::class, 'index'])->name('pilgrims.index');
    Route::get('pilgrims/agent-group-package-list', [PilgrimController::class, 'agentGroupPackageList']);
    Route::post('pilgrims', [PilgrimController::class, 'store'])->name('pilgrims.store');
    Route::delete('pilgrims/{pilgrim}', [PilgrimController::class, 'destroy']);
    Route::get('pilgrims/{pilgrim}/edit', [PilgrimController::class, 'edit']);


    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
