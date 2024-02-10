<?php

use App\Http\Controllers\AdminCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BestTraderProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatisticsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/traders', function () {
    return app(BestTraderProfileController::class)->indexApi();
});

Route::get('/comments', function () {
    return app(CommentController::class)->indexApi();
});

Route::get('/settings', function () {
    return app(SettingsController::class)->indexApi();
});

Route::get('/statistics', function () {
    return app(StatisticsController::class)->indexApi();
});

// index agent only
Route::get('/agents', function () {
    return app(AdminCrudController::class)->indexAgent();
});

// deposit bonus 
Route::get('/depositBonus', function () {
    return app(SettingsController::class)->lastDespositBonus();
});

// add image url
Route::get('/addImageUrl', function () {
    return app(SettingsController::class)->lastAddImageUrl();
});
