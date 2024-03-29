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
})->name('index');

Route::get('/callback', [SpotifyController::class, 'connectAndSearch']);

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register',  [LoginController::class, 'registerForm'])->name('register');
Route::get('/login',  [LoginController::class, 'loginForm'])->name('login');
Route::get('/legal', function() {
    return view('legal');
});
Route::get('/usage-terms', function() {
    return view('usage');
});
Route::get('/about', function() {
    return view('about');
});
// LOGIN/REGISTER ACTIONS //
Route::post('/registeraccount', [LoginController::class, 'createAccount']);
Route::post('/loginaccount', [LoginController::class,  'authenticate']);
Route::get('/account', [ProfileController::class, 'showProfile']);

Route::get('/profile/{username}', [ProfileController::class, 'showAnotherUsersProfile']);
Route::get('/profiles/', [ProfileController::class, 'showProfileList']);

Route::get('/addkeyword/{newgenre}', [UserSettingsController::class, 'addFavouriteGenre']);
Route::get('/removekeyword/{newgenre}', [UserSettingsController::class, 'removeFavouriteGenre']);
Route::get('/addmusic/{track_id}/{track_name}/{track_artist}', [UserSettingsController::class, 'addFavouriteMusic']);
Route::get('/addTrackToAccount/{query}', [SpotifyController::class, 'searchAndAddTrackToAccount']);
Route::get('/removetrack/{track_name}', [UserSettingsController::class, 'removeFavouriteMusic']);
