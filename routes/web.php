<?php

use App\Http\Controllers\Livewire\TaskBoard;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('learn-more', 'learn-more')
    ->name('learn-more');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/roadmap', TaskBoard::class)->name('roadmap');

require __DIR__.'/auth.php';
