@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Piatti</h1>

        <div class="d-flex justify-content-end">
            {{-- i bottoni solo dentro il form!! --}}
            <a class="btn btn-success m-3" href="{{ route('admin.dishes.create') }}">Crea</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Allergeni</th>
                    <th>Prezzo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->allergens }}</td>
                        <td>{{ $dish->price }}</td>
                        <td class="border-top">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-outline-warning btn-sm btn-details"
                                    href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}">
                                    Dettagli
                                </a>
                            </div>
                        </td>
                        <td class="border-top">
                            <!-- Pulsanti -->
                            <div class="d-flex justify-content-center">
                                {{-- MODIFICA --}}
                                <a href="{{ route('admin.dishes.edit', $dish->slug) }}" type="button" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- MODALE PER ELIMINARE -->
                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST">
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
            {{ $dishes->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
