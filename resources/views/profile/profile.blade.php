@extends('template')
@section('title') Mon profil @endsection
@section('content')
    <h1 class="title">Profil</h1>
    <p class="paragraph">Bonjour, {{$user->name}} !</p>
@endsection
