<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - 🎶 FavMus</title>

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
            <a href="/account">Mon compte</a>
            <br>
            <a href="/profiles">Profils</a>
        </p>
    </div>
    <div id="content">
        <nav class="navbar">
            <a class="navbar-brand mb-0 h1" href="/">🎶 FavMus</a>
            <span id="openMenu"><i class="fas fa-bars"></i></span>
        </nav>

        {{--
        <nav class="navbar navbar-light bg-light navbar-nav">
            <a class="navbar-brand mb-0 h1" href="/">🎶 FavMus</a>
            <div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/account">
                                Mon compte
                            </a>
                            <a href="/profiles" class="dropdown-item">
                                Les profils
                            </a>
                        </div>

                    </li>
                </ul>
            </div>
        </nav>
        --}}

        @yield('hero')
        <div class="container" id="primaryContainer">
            @yield('content')
        </div>
    </div>
    @yield('afterPrimaryContainer')
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
</body>
</html>
