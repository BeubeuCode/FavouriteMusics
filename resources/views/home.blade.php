@extends('template')
@section('title')
    Home
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2 class="title">Partagez les musiques que vous aimez.</h2>
            <p class="paragraph">
                Partagez les musiques, les albums et les artistes qui vous tiennent à coeur. FavMus est une plateforme qui
                à pour objectif de faciliter la découverte et le partage de musiques à travers une interface simple, une intégration
                avec Spotify et des profils publics à explorer. Créez-vous un compte, ou connectez vous pour commencer à explorer notre plateforme.
            </p>
            <a href="#" class="btn btn-colored">Créer mon compte</a> <a href="#" class="btn btn-colored">Me connecter</a>
            <br/>
        </div>
        <div class="col-md-6 centered">
            <img src="/svg/listening.svg" class="svgLanding">
        </div>
    </div>
@endsection
