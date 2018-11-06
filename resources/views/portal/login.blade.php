@extends('layout.app')

@section('title', 'Seção login')

@section('content')

<header class="container-fluid border-bottom">
    <nav class="container navbar ">
        <a href="/" class="navbar-brand">#Logo</a>
    </nav>
</header>

<section class="container mt-3">
    <h1 class="p-3">Seção de login</h1>

    <form class="col-lg-6 col-md-6" action="/login/login" method="POST">
        @csrf
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for=""><strong>Senha</strong></label>
            <input class="form-control" type="password" name="password" placeholder="Insira sua senha">
        </div>
        
        <button class="btn btn-primary" type="submit">Logar</button>
    </form>
</section>

@endsection