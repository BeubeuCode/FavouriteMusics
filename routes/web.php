<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\LoginController;

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

Route::get('/callback', [SpotifyController::class, 'connectAndSearch']);

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/register',  [LoginController::class, 'registerForm']);
Route::get('/login',  [LoginController::class, 'loginForm']);

