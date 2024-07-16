@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <p>Nome: <span class="text-primary">{{ $dish->name }}</span></p>
        <p>Prezzo: <span class="text-primary">{{ $dish->price }}</span></p>
        

        <a href="{{route('admin.restaurants.index')}}" class="text-danger">Torna Indietro</a>
    </div>
@endsection