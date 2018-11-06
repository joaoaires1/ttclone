@extends('layout.app')

@section('title', 'Seção de cadastro')

@section('content')

<header class="container-fluid border-bottom">
    <nav class="container navbar ">
        <a href="/logo" class="navbar-brand">#Logo</a>
    </nav>
</header>

<section class="container mt-3">
    <h2 class="p-3">Seção de cadastro</h2>
    <form class="col-md-8" action="/cadastro/store" method="POST">
        @csrf
        <div class="form-group">
            <label for=""><strong>Nome</strong></label>
            <input class="form-control" type="text" name="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for=""><strong>Usuário</strong></label>
            <input class="form-control" type="text" name="username" placeholder="Nome de usuário">
        </div>
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for=""><strong>Senha</strong></label>
            <input class="form-control" type="password" name="password" placeholder="Senha">
        </div>

        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
</section>

@endsection