@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Ristoranti</h1>
        <div class="d-flex justify-content-end">
            {{-- i bottoni solo dentro il form!! --}}
            <a class="btn btn-success m-3" href="">Crea</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Business name</th>
                    <th>Address</th>
                    <th>Vat number</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->business_name }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td>{{ $restaurant->vat_number }}</td>
                        <td> <a class="btn btn-outline-warning btn-sm btn-details " href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->slug]) }}">Dettagli</a></td>
                        <td>
                            <!-- Pulsanti -->
                            <div class="d-flex">
                                {{-- MODIFICA --}}
                                <a href="" type="button" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- CANCELLA --}}
                                    <button type="submit" class="btn btn-outline-danger btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- PAGINATE --}}
        <div class="d-flex justify-content-end m-3">
            {{ $restaurants->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
