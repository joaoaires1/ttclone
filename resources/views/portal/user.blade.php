@extends('layout.userApp')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="../css/home.css">
@endpush

@section('content')

<header class="container-fluid border-bottom">
    <nav class="container navbar ">
        <a href="/home" class="navbar-brand">#Home</a>
        <a href="/procurar" class="">Procurar</a>
        <a href="/perfil" class="">Perfil</a>
        <a href="/login/logout" class="">Sair</a>
    </nav>
</header>

<section class="container mt-3">
    <div class="row">

        <!-- CONTENT LEFT -->
        <div class="col-md-4 panel panel-default mb-3 border">
            <div class="panel-heading pt-2 clearfix">
                <div class="div-img-perfil">
                    <img  class="image rounded-circle" src="/storage/users/{{ $image }}" alt="">
                </div>
                <div class="div-username-perfil">
                    <strong>{{ $name }}</strong> <br>@ {{ $username }}
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

            <div id="timeline">
                @foreach ($posts as $post)
                    <div class="col-12 p-3 border border-top-0">
                        <div>
                            <a href="/user/{{ $username }}">
                            <img src="/storage/users/{{ $image }}" alt="{{ $name }}" class="image rounded-circle">
                            <span class="pl-3"><strong>{{ $name }}</strong> @ {{ $username }}</span>
                            </a>
                        </div>

                        <div class="p-3">{{ $post->content }}</div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</section>

@endsection