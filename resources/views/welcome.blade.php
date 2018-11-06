@extends('layout.app')

@section('title', 'Bem vindo ao tt clone')

@section('content')

<header class="container-fluid border-bottom">
    <nav class="container navbar ">
        <a href="/" class="navbar-brand">#Logo</a>
        
        <form class="form-inline d-none d-md-block d-lg-block" action="/login/login" method="POST">
            @csrf
            <input class="form-control mr-sm-2 " type="email" name="email" placeholder="Email" aria-label="email">
            <input class="form-control mr-sm-2 " type="password" name="password" placeholder="Senha" aria-label="senha">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Logar</button>
        </form>

        <a href="/login" class="btn btn-primary float-right d-sm-block d-xs-block d-md-none">logar</a>
    </nav>
</header>

<section class="container mt-4">
    <div class="col-md-8">
        <h1>Bem vindo ao TT Clone!</h1>
        <p>Sistema com funcionalidades semelhantes ao da rede social twitter, desenvolvido para demostrar habilidades em back-end (Php\Framework Laravel\Banco de dados MySQL) e Front-end(JavaScript\Html\Css\Bootstrap\jQuery\Ajax).</p>
        <a href="/cadastro" class="btn btn-primary">Cadastrar-se</a>
    </div>
</section>

@endsection