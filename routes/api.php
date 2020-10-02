<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/search/{type}/{query}', [SpotifyController::class, 'connectAndSearch']);
//requests
Route::get('/search/', [SpotifyController::class, 'connectAndSearch']); //two get args
// 'query' et 'type'
Route::get('/track/{trackID}', [SpotifyController::class, 'getTrack']);
Route::get('/artist/{artistID}', [SpotifyController::class, 'getArtist']);
Route::get('/album/{albumID}', [SpotifyController::class, 'getAlbum']);

