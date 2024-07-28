@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-5">Modifica un piatto!</h1>
        @include('partials.errors')
        <form action="{{ route('admin.dishes.update', ['dish' => $dish->slug]) }}" method="POST" class="mb-3"
            enctype=multipart/form-data>
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nome <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $dish->name) }}">
            </div>

            <div class="form-group">
                <label for="description" class="form-label fw-semibold">Descrizione <span
                        class="text-danger">*</span></label>
                <textarea name="description" class="form-control" id="description"> {{ old('description', $dish->description) }}</textarea>
            </div>



            <div class="mb-3">
                <label for="allergens" class="form-label fw-semibold">Allergeni</label>
                <input type="text" class="form-control" id="allergens" name="allergens"
                    value="{{ old('allergens', $dish->allergens) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Prezzo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="price" name="price"
                    value="{{ old('price', $dish->price) }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Immagine</label>
                <input type="file" class="form-control" id="image" name="thumb"
                    value="{{ old('thumb', $dish->thumb) }}">
            </div>
            {{-- IMMAGINE --}}
            <div class="mt-3 mb-2">
                <!-- Impostazioni delle dimensioni massime dell'immagine di anteprima -->
                <img class="d-none img-thumbnail" id="preview_image" src="" alt="Anteprima Immagine"
                    style="max-width: 200px; max-height: 200px;">
            </div>
            {{-- IMMAGINE --}}

            <div class="mb-4 mt-4 row">
                <p class="fs-6 fst-italic"><span class="text-danger">*</span> Questi campi sono obbligatori</p>
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>

        {{-- <a href="{{ route('admin.dishes.index') }}" class="text-decoration-none text-white bg-danger p-2 rounded-2">Torna
            alla pagina Iniziale</a> --}}
    </div>
@endsection
