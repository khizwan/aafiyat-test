<?php

use App\Http\Controllers\UserController;

Route::get('/form', function () {
    return view('form');
})->name('user.form');

Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/table', [UserController::class, 'index'])->name('user.index');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
