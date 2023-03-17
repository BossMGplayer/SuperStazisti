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

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::post('/follow/{user}', [\App\Http\Controllers\FollowsController::class, 'store']);

Route::post('/home/filtered', [\App\Http\Controllers\FilterController::class, 'FilterByTags'])->name('filterByTags');

Route::get('/change-password', [\App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [\App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

Route::get('/post/create', [App\Http\Controllers\JobPostController::class, 'create']);
Route::get('/post/{jobOfferPost}', [App\Http\Controllers\JobPostController::class, 'show'])->name('post.show');
Route::post('/post', [App\Http\Controllers\JobPostController::class, 'store'])->name('post.store');

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::post('/lang', [App\Http\Controllers\LanguageController::class, 'store'])->name('lang.store');
Route::delete('/lang/{id}', [App\Http\Controllers\LanguageController::class, 'delete'])->name('lang.delete');

