@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <p>Business name: <span class="text-primary">{{ $restaurant->business_name }}</span></p>
        <p>Address: <span class="text-primary">{{ $restaurant->address }}</span></p>
        <p>Vat number: <span class="text-primary">{{ $restaurant->vat_number }}</span></p>
        
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