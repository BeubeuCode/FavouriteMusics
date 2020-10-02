@extends('template')
@section('title') Mon profil @endsection
@section('content')
    <h1 class="title">Profil</h1>
    <p class="paragraph">Bonjour, {{$user->name}} !</p>
    <hr>
    <h3 class="title">Genres Favoris</h3>
    <p>
        @php $genres_arr = explode(',', $genres->favgenres) @endphp
        @foreach($genres_arr as $el)
            @if(next($genres_arr) !== false)
                {{ $el  }},
            @else
                {{$el}}
            @endif
        @endforeach
    </p>

@endsection
