@extends('template')
@section('title') Profils @endsection
@section('content')
    <h1 class="title">Profils</h1>
    <hr>
    @foreach($allAccounts as $account)
        <p class="paragraph">{{$account->name}}</p>
        <p class="paragraph"><a href="/profile/{{$account->name}}" class="btn btn-colored">Voir ce profil</a></p>
        <hr>
    @endforeach

@endsection
