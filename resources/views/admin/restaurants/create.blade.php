@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Crea il tuo ristorante</h3>
            </div>
            @include('partials.errors')
            <div class="card-body">
                <form action="{{ route('admin.restaurants.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Nome del ristorante</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="vat_number" class="form-label">P. Iva</label>
                        <input type="number" class="form-control" id="vat_number" name="vat_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="typology_id" class="form-label">Tipologia</label>
                        <select class="form-select" id="typology_id" name="typology_id" required>
                            <option value="" selected>Open this select menu</option>
                            @foreach ($typologies as $typologies)
                                <option value="{{$typologies->id}}">{{$typologies->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
