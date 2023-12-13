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

Route::prefix('traders')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\BestTraderProfileController::class, 'index'])->name('traders.index');
    Route::get('/create', [App\Http\Controllers\BestTraderProfileController::class, 'create'])->name('traders.create');
    Route::post('/', [App\Http\Controllers\BestTraderProfileController::class, 'store'])->name('traders.store');
    Route::get('/{trader}', [App\Http\Controllers\BestTraderProfileController::class, 'show'])->name('traders.show');
    Route::get('/{trader}/edit', [App\Http\Controllers\BestTraderProfileController::class, 'edit'])->name('traders.edit');
    Route::put('/{trader}', [App\Http\Controllers\BestTraderProfileController::class, 'update'])->name('traders.update');
    Route::delete('/{trader}', [App\Http\Controllers\BestTraderProfileController::class, 'destroy'])->name('traders.destroy');
});
Route::prefix('comments')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    Route::get('/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
    Route::post('/', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::get('/{comment}', [App\Http\Controllers\CommentController::class, 'show'])->name('comments.show');
    Route::get('/{comment}/edit', [App\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/{comment}', [App\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
    Route::delete('/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');
});
