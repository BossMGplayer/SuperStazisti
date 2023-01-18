<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('/jo', [App\Http\Controllers\JobOfferPostController::class, 'store'])->name('jo.store');

Route::get('/jr/create', [App\Http\Controllers\JobRequestPostController::class, 'create']);
Route::get('/jr/{jobRequestPost}', [App\Http\Controllers\JobRequestPostController::class, 'show']);
Route::post('/jr', [App\Http\Controllers\JobRequestPostController::class, 'store'])->name('jr.store');

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


