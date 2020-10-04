<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedGenres;
use App\Models\UserFavoriteSongs;
use Illuminate\Support\Facades\Redirect;

class UserSettingsController extends Controller
{
    public function addFavouriteGenre(Request $request) {
        $user = Auth::user();
        $genresReq = LikedGenres::where('user_id', $user->id)->first();
        $genres = $genresReq->favgenres;
        $genres = $genres . ',' . $request->newGenre;
        $genresReq->favgenres = $genres;
        $genresReq->save();
        return Redirect::back();
    }

    public function removeFavouriteGenre(Request $request) {
        $user = Auth::user();
        $genresReq = LikedGenres::where('user_id', $user->id)->first();
        $genres = $genresReq->favgenres;
        $genres = str_replace(','.$request, '', $genres);
        $genresReq->favgenres = $genres;
        $genresReq->save();
        return Redirect::back();
    }

    public function addFavouriteMusic(Request $request) {
        $user = Auth::user();
        $newMusic = new UserFavoriteSongs;
        $newMusic->user_id = $user->id;
        $newMusic->track_id = $request->track_id;
        $newMusic->track_name = $request->track_name;
        $newMusic->track_artist = $request->track_artist;
        $newMusic->save();
        return Redirect::back();
    }
}
