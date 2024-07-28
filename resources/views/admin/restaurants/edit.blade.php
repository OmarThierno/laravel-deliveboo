@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-5">Modifica il ristorante</h1>

        @include('partials.session_message')
        @include('partials.errors')

        <form action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="business_name" class="form-label">Nome del ristorante <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="business_name" name="business_name"
                    value="{{ old('business_name', $restaurant->business_name) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $restaurant->address) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            {{-- IMMAGINE --}}
            <div class="mt-3 mb-2">
                <!-- Impostazioni delle dimensioni massime dell'immagine di anteprima -->
                <img class="d-none img-thumbnail" id="preview_image" src="" alt="Anteprima Immagine"
                    style="max-width: 200px; max-height: 200px;">
            </div>
            {{-- IMMAGINE --}}
            <div class="mb-3">
                <label for="vat_number" class="form-label">P. Iva <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="vat_number" name="vat_number"
                    value="{{ old('vat_number', $restaurant->vat_number) }}" required>
            </div>
            <div class="mb-3">
                <label for="typology_id" class="form-label">Tipologia <span class="text-danger">*</span></label>
                <select class="form-select" id="typology_id" name="typology_id" required>
                    @foreach ($typologies as $typology)
                        <option value="{{ $typology->id }}"
                            {{ $restaurant->typologies->contains($typology->id) ? 'selected' : '' }}>{{ $typology->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 mt-4 row">
                <p class="fs-6 fst-italic"><span class="text-danger">*</span> Questi campi sono obbligatori</p>
            </div>
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
            <a href="{{ route('admin.restaurants.show', $restaurant->slug) }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
