<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="">
        <meta name="description" content="Partagez vos gouts musicaux sur FavMus, et découvrez de nouvelles musiques !">
        <title>@yield('title') - 🎶 FavMus</title>
        <meta property="og:title" content="@yield('title') - FavMus" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Partagez vos gouts musicaux sur FavMus, et découvrez de nouvelles musiques !" />
        <meta property="og:url" content="{{Request::url()}}" />
        <meta property="og:image" content="{{url('/')}}/svg/teamspirit.svg"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="/scss/app.css">
    </head>
    <body>
    <div id="modalMenu" style="display: none;">
        <div id="closeMenu">
            <i class="fas fa-times"></i>
        </div>

        <h1 class="title">FavMus</h1>
        <p>
            @if(\Illuminate\Support\Facades\Auth::user() != null)
                <a href="/account">Mon compte</a>
                <br>
                <a href="/logout">Me déconnecter</a>
            @else
                <a href="/login">Se connecter</a>
                <br>
                <a href="/logout">S'inscrire</a>
            @endif
            <br>
            <a href="/profiles">Profils</a>
            <br>

        </p>
    </div>
    <div id="content">
        <nav class="navbar">
            <a class="navbar-brand mb-0 h1" href="/">🎶 FavMus</a>
            <span id="openMenu"><i class="fas fa-bars"></i></span>
        </nav>


        @yield('hero')
        <div class="container" id="primaryContainer">
            @yield('content')
        </div>
    </div>
    </div>

    <footer id="footer" class="aufond">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footerSec"><p class="paragraph">© Benoît Arnoult - Réalisé dans le cadre d'une candidature à un poste de développeur web.</p></div>
                <div class="col-md-4 footerSec">
                    <p class="paragraph"><a href="/profiles">Les Profils</a></p>
                    <p class="paragraph"><a href="/login">Se connecter</a></p>
                    <p class="paragraph"><a href="/register">S'inscire</a></p>
                </div>
                <div class="col-md-4 footerSec">
                    <p class="paragraph"><a href="/about">A propos</a></p>
                    <p class="paragraph"><a href="/legal">Mentions Légales</a></p>
                    <p class="paragraph"><a href="/usage-terms">CGU</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
</body>
</html>
