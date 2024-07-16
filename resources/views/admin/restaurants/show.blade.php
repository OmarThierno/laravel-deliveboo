@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <p>Nome del ristorante: <span class="text-primary">{{ $restaurant->business_name }}</span></p>
        <p>Indirizzo: <span class="text-primary">{{ $restaurant->address }}</span></p>
        <p>P. Iva : <span class="text-primary">{{ $restaurant->vat_number }}</span></p>
        
        <ul>
            @foreach ($restaurant->dishes as $dish)
            <li>
                {{$dish->name}}
                </li>
            @endforeach
        </ul>

        @foreach ($restaurant->dishes as $dish)
            <p class="badge bg-primary">
                {{$dish->allergens}}
            </p>
            @endforeach
        <a href="{{route('admin.restaurants.index')}}" class="text-danger">Torna Indietro</a>
    </div>
@endsection