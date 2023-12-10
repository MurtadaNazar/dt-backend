<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->withoutMiddleware('IsActive');

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->middleware('isAdmin')->name('auth.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->middleware('isAdmin')->name('user.home');


Route::prefix('users')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminCrudController::class, 'index'])->name('users.index');
    Route::get('/create', [App\Http\Controllers\AdminCrudController::class, 'create'])->name('users.create');
    Route::post('/', [App\Http\Controllers\AdminCrudController::class, 'store'])->name('users.store');
    Route::get('/{user}', [App\Http\Controllers\AdminCrudController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [App\Http\Controllers\AdminCrudController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [App\Http\Controllers\AdminCrudController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [App\Http\Controllers\AdminCrudController::class, 'destroy'])->name('users.destroy');
});
