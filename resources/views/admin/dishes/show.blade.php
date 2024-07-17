@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Dettagli del piatto</h1>

        <div class="card mb-4" style="max-width: 500px;">
            <div class="card-body">
                <p class="card-text"><strong>Nome del piatto:</strong> {{ $dish->name }}</p>
                <p class="card-text"><strong>Descrizione</strong> {{ $dish->description }}</p>
                <p class="card-text"><strong>Allergeni:</strong> {{ $dish->allergens }}</p>
                <p class="card-text"><strong>Prezzo:</strong> {{ $dish->price }}</p>
            </div>
        </div>
        <a href="{{route('admin.dishes.index')}}" class="text-danger">Torna Indietro</a>
    </div>
@endsection