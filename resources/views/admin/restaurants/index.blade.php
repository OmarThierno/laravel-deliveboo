@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        @if ($error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <div class="text-center mt-4">
            <h1>Benvenuto nel Pannello di Amministrazione!</h1>
            <p class="lead">Sembra che tu non abbia ancora creato il tuo ristorante.</p>
                <p class="lead"> Inizia subito a creare il tuo ristorante e gestisci facilmente i tuoi piatti e ordini.</p>
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-outline-success btn-lg mt-4">Crea il Tuo Ristorante</a>
        </div>
    </div>
@endsection
