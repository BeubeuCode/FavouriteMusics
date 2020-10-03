<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedGenres;
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
}
