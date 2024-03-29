@extends('template')
@section('title') S'inscrire @endsection
@section('content')
    <h2 class="title">Créer un compte</h2>
    @if(isset($error_message))
        <h3 class="paragraph" style="color:red;">{{ $error_message }}</h3>
    @endif
    <form action="/registeraccount" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="paragraph">Email</label>
            <input class="form-control" type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="username" class="paragraph">Nom d'utilisateur</label>
            <input class="form-control" type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password1" class="paragraph">Mot de passe</label>
            <input class="form-control" type="password" name="password1" id="password1">
        </div>
        <div class="form-group">
            <label for="password2" class="paragraph">Confirmer le mot de passe</label>
            <input class="form-control" type="password" name="password2" id="password2">
            <p class="text-muted" id="incorrectPasswordText" style="color: red !important; display: none;">Les mots de passe doivent correspondre !</p>
        </div>
        <div class="form-group">
            <input type="checkbox" class="form-check-input" name="CGUConfirmation" id="CGUConfirmation">
            <label class="paragraph" for="CGUConfirmation">J'affirme avoir pris connaissance des <a target="_blank" href="/usage-terms">conditions d'utilisation</a></label>
        </div>
        <div class="form-group">
            <input id="createAccountButton" disabled class="btn btn-colored" type="submit" value="S'inscrire">
        </div>
    </form>
    <div class="card">
        <card class="card-body">
            <p class="card-text paragraph">Vous avez déjà un compte ? <a href="/login">Se connecter</a></p>
        </card>
    </div>
@endsection
