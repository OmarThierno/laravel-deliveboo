@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <p>name: <span class="text-primary">{{ $dish->name }}</span></p>
        <p>prezzo: <span class="text-primary">{{ $dish->price }}</span></p>
        

        <a href="{{route('admin.restaurants.index')}}" class="text-danger">Torna Indietro</a>
    </div>
@endsection