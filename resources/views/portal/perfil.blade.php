@extends('layout.app')

@section('title', 'Seção perfil')

@section('content')

<header class="container-fluid border-bottom">
    <nav class="container navbar ">
        <a href="/home" class="navbar-brand">#Home</a>
        <!-- <a href="/procurar" class="">Procurar</a>
        <a href="/perfil" class="">Perfil</a>
        <a href="/login/logout" class="">Sair</a> -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/procurar">Procurar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/perfil">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/logout">Sair</a>
            </li>
        </ul>
    </nav>
</header>

<section class="container mt-3">
    <h2 class="p-3">Editar perfil</h2>
    <form class="col-md-8" action="/perfil/update" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for=""><strong>Nome</strong></label>
            <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for=""><strong>Usuário</strong></label>
            <input class="form-control" type="text" name="username" value="{{ auth()->user()->username }}" placeholder="Nome de usuário">
        </div>
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email">
        </div>
        <div class="form-group">
            <label for=""><strong>Senha</strong></label>
            <input class="form-control" type="password" name="password" placeholder="Senha">
        </div>
        <div class="form-group">
            <label for=""><strong>Imagem de perfil</strong></label>
            <input class="form-control" type="file" name="image">
        </div>

        <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
</section>

@endsection