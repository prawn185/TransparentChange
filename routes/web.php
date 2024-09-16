<?php

use App\Http\Controllers\Livewire\TaskBoard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DonationController;

Auth::routes();



Route::view('/', 'welcome');

Route::view('learn-more', 'learn-more')
    ->name('learn-more');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('roadmap', 'roadmap')->name('roadmap');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/donations', [DonationController::class, 'store']);
    Route::put('/donations/{donation}', [DonationController::class, 'update']);
    Route::get('/donations', [DonationController::class, 'index']);
    Route::get('/donations/{id}', [DonationController::class, 'view'])->name('donation.view');
});
