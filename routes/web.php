<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSettingsController;


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
// LOGIN/REGISTER ACTIONS //
Route::post('/registeraccount', [LoginController::class, 'createAccount']);
Route::post('/loginaccount', [LoginController::class,  'authenticate']);
Route::get('/account', [ProfileController::class, 'showProfile']);

Route::get('/profile/{username}', [ProfileController::class, 'showAnotherUsersProfile']);
Route::get('/addmusic/{track_artist}/{track_name}/{track_id}', [UserSettingsController::class, 'addFavouriteMusic']);
Route::get('/getTrackInfo/{query}', function($query) {
    SpotifyController::searchAndAddTrackToAccount($query);
});
