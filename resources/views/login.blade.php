@extends('template')
@section('title') Se connecter @endsection
@section('content')
    @if(isset($loginFail))
        <p class="paragraph" style="color:red;">Adresse mail ou mot de passe incorrect</p>
    @endif
    <h2 class="title">Se connecter</h2>
    <form action="/loginaccount" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="paragraph">Email</label>
            <input class="form-control" type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password1" class="paragraph">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <input class="btn btn-colored" type="submit" value="Se connecter">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="rememberMe" name="rememberMe" class="form-check-input">
                <label for="rememberMe" class="form-check-label paragraph">Se souvenir de moi</label>
            </div>
        </div>
    </form>
    <div class="card">
        <card class="card-body">
            <p class="card-text paragraph">Vous n'avez pas de compte ? <a href="/register">S'inscrire</a></p>
        </card>
    </div>
@endsection
