@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Dettagli Ristorante</h1>

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <p class="card-text"><strong>Nome del ristorante:</strong> {{ $restaurant->business_name }}</p>
                <p class="card-text"><strong>Indirizzo:</strong> {{ $restaurant->address }}</p>
                <p class="card-text"><strong>P. Iva:</strong> {{ $restaurant->vat_number }}</p>
                
                @if ($restaurant->typologies->count() > 0)
                    <p class="card-text"><strong>Tipologie:</strong>
                        @foreach ($restaurant->typologies as $index => $typology)
                            {{ $typology->name }}
                            @if ($index < $restaurant->typologies->count() - 1)
                                ,
                            @endif
                        @endforeach
                    </p>
                @endif
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}" class="btn btn-outline-primary me-2">Modifica</a>

            <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->slug]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Sei sicuro di voler eliminare questo ristorante?')">Elimina</button>
            </form>
        </div>
    </div>
@endsection