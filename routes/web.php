<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

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

Route::get('workshops', [WorkshopController::class, 'index']);
Route::get('workshops/create', [WorkshopController::class, 'create']);
Route::post('workshops', [WorkshopController::class, 'store']);
Route::get('workshops/{id}/edit', [WorkshopController::class, 'edit']);
Route::put('workshops/{id}', [WorkshopController::class, 'update']);
Route::delete('workshops/{id}', [WorkshopController::class, 'destroy']);



require __DIR__.'/auth.php';
