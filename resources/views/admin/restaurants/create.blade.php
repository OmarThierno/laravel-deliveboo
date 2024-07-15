@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="my-5">Crea un ristorante</h1>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" class="mb-3">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf

            <div class="mb-3">
                <label for="business_name" class="form-label fw-semibold">Nome Business</label>
                <input type="text" class="form-control" id="business_name" name="business_name">
            </div>

            <div class="form-group">
                <label for="address" class="form-label fw-semibold">Indirizzo</label>
                <textarea name="address" class="form-control" id="address"></textarea>
            </div>

            <div class="mb-3">
                <label for="vat_number" class="form-label fw-semibold">Partita IVA</label>
                <input type="text" class="form-control" id="vat_number" name="vat_number">
            </div>

            <div class="mb-3">  
                <label for="image" class="form-label fw-semibold">Immagine</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>

        <a href="{{ route('admin.restaurants.index') }}" class="text-decoration-none text-white bg-danger p-2 rounded-2">Torna
            alla pagina Iniziale</a>
    </div>
@endsection
