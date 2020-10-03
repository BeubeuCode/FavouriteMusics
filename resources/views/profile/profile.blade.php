@extends('template')
@section('title') Mon profil @endsection
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
                @php $genres_arr = explode(',', $genres->favgenres) @endphp
                @foreach($genres_arr as $el)
                    @if(next($genres_arr) !== false)
                        {{ $el }},
                    @else
                        {{$el}}
                    @endif
                @endforeach
            </p>
            @else
                <p class="paragraph">Pas de genres favoris !</p>
            @endif
        </div>

        <div class="col-md-4">
            <h3 class="title">Musiques favorites</h3>
            <p class="paragraph">Pas de musiques favorites !</p>
        </div>
    </div>


    <hr>


@endsection
