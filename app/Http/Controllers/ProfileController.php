<?php

namespace App\Http\Controllers;

use App\Models\LikedGenres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
    private function getGravatarProfilePicture($email, $size) {
        $emailHash = md5(strtolower(trim($email)));
        return 'https://www.gravatar.com/avatar/'. $emailHash . '?s=' . $size ;
    }

    public function showProfile() {
        $user = Auth::user();
        if($user === null) { return Response::redirectTo('/login'); }
        $genres = LikedGenres::where('user_id', $user->id)->first();
        $profilePicture = $this->getGravatarProfilePicture($user->email, 150);
        if(!$genres) {
            return Response::view('profile.profile', compact(['user', 'profilePicture']));
        } else {
            return Response::view('profile.profile', compact(['user', 'genres', 'profilePicture']));
        }
    }

    public function showAnotherUsersProfile($username) {
        $user = User::where('name', $username)->first();
        if($user === null) { return abort(404); }
        $genres = LikedGenres::where('user_id', $user->id)->first();
        $profilePicture = $this->getGravatarProfilePicture($user->email, 150);
        if(!$genres) {
            return Response::view('profile.profile', compact(['user', 'profilePicture']));
        } else {
            return Response::view('profile.profile', compact(['user', 'genres', 'profilePicture']));
        }
    }
}
