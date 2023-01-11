<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/jo/create', [App\Http\Controllers\JobOfferPostController::class, 'create']);
Route::get('/jo/{jobOfferPost}', [App\Http\Controllers\JobOfferPostController::class, 'show']);
Route::post('/jo', [App\Http\Controllers\JobOfferPostController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');


