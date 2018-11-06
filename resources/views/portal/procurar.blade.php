@extends('layout.app')

@section('title', 'Seção procurar')

@push('styles')
<link rel="stylesheet" href="css/procurar.css">
@endpush

@push('scripts')
<script src="js/procurar.js"></script>
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

<section class="container mt-2">
    <h2 class="p-3">Procurar pessoas</h2>

    <form id="form-procurar" class="form-inline col-md-8">
        @csrf
        <input class="form-control mr-sm-2 " type="text" name="pessoa" placeholder="Nome da pessoa" aria-label="email" required>
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Procurar</button>
    </form>
</section>

<section class="container">
    <div class="pessoas mt-4">
        
    </div>
</section>

@endsection