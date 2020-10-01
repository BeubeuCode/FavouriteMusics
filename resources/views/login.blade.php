@extends('template')
@section('title') Se connecter @endsection
@section('content')
    <h2 class="title">Se connecter</h2>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="paragraph">Email</label>
            <input class="form-control" type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password1" class="paragraph">Mot de passe</label>
            <input class="form-control" type="password" name="password1" id="password1">
        </div>

        <div class="form-group">
            <input class="btn btn-colored" type="submit" value="Se connecter">
        </div>
    </form>
    <div class="card">
        <card class="card-body">
            <p class="card-text paragraph">Vous n'avez pas de compte ? <a href="/register">S'inscrire</a></p>
        </card>
    </div>
@endsection
