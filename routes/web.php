<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLinksController;

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
    return view('home');
});

Route::get('/links', [UserLinksController::class, 'show'])->middleware('auth');
Route::put('/link-update', [UserLinksController::class, 'update'])->middleware('auth');
Route::delete('/remove-link', [UserLinksController::class, 'delete'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
