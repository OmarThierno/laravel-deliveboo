@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('partials.session_message')

        <div class="card">
            <div class="card-header">
                <h3>Crea il tuo ristorante</h3>
            </div>
            <div class="container p-3">@include('partials.errors')</div>
            <div class="card-body">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Nome del ristorante <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="business_name" name="business_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">

                        <div class="mt-3 mb-2">
                            <!-- Impostazioni delle dimensioni massime dell'immagine di anteprima -->
                            <img class="d-none img-thumbnail" id="preview_image" src="" alt="Anteprima Immagine"
                                style="max-width: 200px; max-height: 200px;">
                        </div>

                        <div class="mb-3">
                            <label for="vat_number" class="form-label">P. Iva <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vat_number" name="vat_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="typology_id" class="form-label">Tipologia <span class="text-danger">*</span></label>
                            <select class="form-select" id="typology_id" name="typology_id" required>
                                <option value="" selected>Scegli una delle seguenti tipologie</option>
                                @foreach ($typologies as $typologies)
                                    <option value="{{ $typologies->id }}">{{ $typologies->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 mt-4 row">
                            <p class="fs-6 fst-italic"><span class="text-danger">*</span> Questi campi sono obbligatori
                            </p>
                        </div>
                        <button type="submit" class="btn btn-success">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
