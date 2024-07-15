@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="my-5">Aggiungi un piatto!</h1>

        <form action="{{ route('admin.dishes.store') }}" method="POST" class="mb-3">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="description" class="form-label fw-semibold">Descrizione</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>

            
            
            <div class="mb-3">
                <label for="allergens" class="form-label fw-semibold">Allergeni</label>
                <input type="text" class="form-control" id="allergens" name="allergens">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Prezzo</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price">
            </div>

            <div class="mb-3">  
                <label for="thumb" class="form-label fw-semibold">Immagine</label>
                <input type="file" class="form-control" id="thumb" name="thumb">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>

        {{-- <a href="{{ route('admin.dishes.index') }}" class="text-decoration-none text-white bg-danger p-2 rounded-2">Torna
            alla pagina Iniziale</a> --}}
    </div>
@endsection
