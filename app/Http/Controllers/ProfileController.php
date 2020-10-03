<?php

namespace App\Http\Controllers;

use App\Models\LikedGenres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
    public function showProfile() {
        $user = Auth::user();
        if($user === null) { return Response::redirectTo('/login'); }
        $genres = LikedGenres::where('user_id', $user->id)->first();
        return Response::view('profile.profile', compact(['user', 'genres']));
    }
}
