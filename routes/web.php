<?php

use App\Http\Controllers\StudenController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    
    Route::get('/students', [StudenController::class, 'index'])->name('students.index');
    Route::post('/students', [StudenController::class, 'store'])->name('students.store');
    Route::get('/students/create', [StudenController::class, 'create'])->name('students.create');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
