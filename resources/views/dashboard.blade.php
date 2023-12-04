@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <h1 class="mt-3">Dashboard</h1>

    @if(isset($categorias) && isset($ejercicios) && isset($archivos))

    <div class="row mt-5 mb-5">
        <div class="col-md-4">

            <div class="card text-white mb-3" style="background-color: cornflowerblue">
                <div class="card-header"><i class="fas fa-heart me-1"></i> Categorías</div>
                <div class="card-body">
                  <h2 class="card-title text-center">{{ $categorias->count() }}</h2>
                </div>
            </div>

        </div>

        <div class="col-md-4">
           
            <div class="card text-white mb-3" style="background-color: #199094">
                <div class="card-header"><i class="fas fa-running me-1"></i>Ejercicios</div>
                <div class="card-body">
                  <h2 class="card-title text-center">{{ $ejercicios->count() }}</h2>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card text-white mb-3" style="background-color: palevioletred">
                <div class="card-header"><i class="fas fa-file me-1"></i>Archivos</div>
                <div class="card-body">
                  <h2 class="card-title text-center">{{ $archivos->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    @else
        <p>No se encontraron datos.</p>
    @endif

@endsection
