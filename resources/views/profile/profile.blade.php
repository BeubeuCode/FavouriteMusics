@extends('template')
@section('title') Profil de {{$user->name}} @endsection
@section('content')
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="centered">
                <img src="{{$profilePicture}}" alt="profile_picture" class="circleImage">
                <h1 class="title">Profil</h1>
                <p class="paragraph">Bonjour, {{$user->name}} !</p>
            </div>

        </div>
        <div class="col-md-4">
            <h3 class="title">Genres Favoris</h3>
            @if(isset($genres))
            <p class="paragraph">
                <ul>
                @php $genres_arr = explode(',', $genres->favgenres) @endphp
                @foreach($genres_arr as $el)
                    <li class="paragraph">{{$el}}</li>
                @endforeach
                </ul>
            </p>
            @else
                <p class="paragraph">Pas de genres favoris !</p>
            @endif
        </div>

        <div class="col-md-4">
            <h3 class="title">Musiques favorites</h3>
            @if(isset($favsongs))
                @foreach($favsongs as $song)
                    <p class="paragraph"><b>{{$song->track_name}}</b> par <b>{{$song->track_artist}}</b>
                        <br>
                        <a href="https://open.spotify.com/track/{{$song->track_id}}" target="_blank">Ecouter sur spotify</a>

                    </p>
                @endforeach
            @else
                <p>
                    Aucune musique favorite... pour l'instant !
                </p>
            @endif
        </div>
    </div>
    <hr>
    @if(\Illuminate\Support\Facades\Auth::user() != null)
        <div class="row" id="settings">
            <div class="col-md-6">
                <h2 class="title">Paramètres</h2>
                <h3 class="title">Genres favoris</h3>
                <div class="form-group">
                    <label for="newGenreInput">Enelver un genre : </label>
                    <input class="form-control" type="text" id="oldGenreInput" name="newGenreInput">
                    <br>
                    <button class="btn btn-colored" id="removeGenreButton">Enlever</button>
                </div>
                <div class="form-group">
                    <label for="newGenreInput">Ajouter un genre : </label>
                    <input class="form-control" type="text" id="newGenreInput" name="newGenreInput">
                    <br>
                    <button class="btn btn-colored" id="addGenreButton">Ajouter</button>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="title">Musiques favorites</h3>

            </div>
        </div>

    @endif
@endsection
