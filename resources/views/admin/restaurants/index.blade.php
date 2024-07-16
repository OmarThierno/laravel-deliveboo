
@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="text-center mt-4">
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-outline-success me-2">Crea</a>
        </div>
    </div>
@endsection
