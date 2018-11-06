@extends('layout.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="css/home.css">
@endpush

@push('scripts')
<script src="js/home.js"></script>
@endpush

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
    <div class="row">

        <!-- CONTENT LEFT -->
        <div class="col-md-4 panel panel-default mb-3 border">
            <div class="panel-heading pt-2 clearfix">
                <div class="div-img-perfil">
                    <img  class="image rounded-circle" src="{{ url('/uploadedimages/' . auth()->user()->image) }}" alt="">
                </div>
                <div class="div-username-perfil">
                    <strong>{{ $name }}</strong> <br> {{ $username }}
                </div>
            </div>

            <hr>

            <div class="panel-body clearfix">
                <div class="stats"> <span class="stats-name">Tweets</span> <br> <span class="stats-num">{{ $tweets }}</span> </div>
                <div class="stats"> <span class="stats-name">Seguindo</span> <br> <span class="stats-num">{{ $seguindo }}</span> </div>
                <div class="stats"> <span class="stats-name">Seguidores</span> <br> <span class="stats-num">{{ $seguidores }}</span> </div>
            </div>
        </div>        

        <!-- CONTENT RIGTH -->
        <div class="col-md-8">
            <div class="col-12 p-3 clearfix form-postar border">
                <form id="form-tweet">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" placeholder="O que está acontecendo?" maxlength="140" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right font-weight-bold">Tweetar</button>
                </form>
            </div>

            <div id="timeline"></div>
        </div>
    </div>
</section>

@endsection