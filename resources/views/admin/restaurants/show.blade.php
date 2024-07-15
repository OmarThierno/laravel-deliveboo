@extends('layouts.admin')

@section('content')
    <p>Business name:<span class="text-primary">{{ $restaurant->business_name }}</span></p>
    <p>Slug:<span class="text-primary">{{ $restaurant->slug }}</span></p>
    <p>Address: <span class="text-primary">{{ $restaurant->address }}</span></p>
    <p>Vat number: <span class="text-primary">{{ $restaurant->vat_number }}</span></p>
    
        {{-- @foreach ($restaurant->typologies as $item)
        <p class="badge fs-6">
            {{$item->name}}
            </p>
        @endforeach --}}
    
    <a href="{{route('admin.restaurants.index')}}" class="text-danger">Torna Indietro</a>
@endsection