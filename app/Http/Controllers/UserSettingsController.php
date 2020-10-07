<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedGenres;
use App\Models\UserFavoriteSongs;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class UserSettingsController extends Controller
{
    public function addFavouriteGenre($newGenre) {
        $user = Auth::user();
        $genresReq = LikedGenres::where('user_id', $user->id)->first();
        if($genresReq != null) {
            $genres = $genresReq->favgenres;
            $genres = $genres . ',' . $newGenre;
            $genresReq->favgenres = $genres;
            $genresReq->save();
        } else {
            $genresReq = new LikedGenres;
            $genresReq->user_id = Auth::id();
            $genresReq->favgenres = $newGenre;
            $genresReq->save();
        }

        return Redirect::back();
    }

    public function removeFavouriteGenre($newgenre) {
        $user = Auth::user();
        $genresReq = LikedGenres::where('user_id', $user->id)->first();
        if(stristr($genresReq->favgenres, $newgenre)) {
            $genres = $genresReq->favgenres;
            $genres = str_replace(','.$newgenre, '', $genres);
            $genresReq->favgenres = $genres;
            $genresReq->save();
        }
        return Redirect::back();
    }

    public function addFavouriteMusic($track_id, $track_name, $track_artist) {
        $newMusic = new UserFavoriteSongs();
        $newMusic->user_id = Auth::id();
        $newMusic->track_id = $track_id;
        $newMusic->track_name = $track_name;
        $newMusic->track_artist = $track_artist;
        $newMusic->save();
        return Redirect('/account');
    }

    public function removeFavouriteMusic($track_name) {
        $user = Auth::user();
        $musicToRemove = UserFavoriteSongs::where('user_id', $user->id)->where('track_name',$track_name)->first();
        if($musicToRemove->delete()) {
            return Redirect('/account');
        } else {
            $musicNotFound = true;
            return Redirect('/account')->with('musicNotFound');
        }
    }
}
