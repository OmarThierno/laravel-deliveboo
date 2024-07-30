@extends('layouts.admin')

@section('content')
    <div class="container">

        <h1 class="mt-3">Piatti</h1>
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
                    <th>Visibile</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->allergens }}</td>
                        <td>{{ $dish->price }}</td>
                        <td>
                            <select class="form-select visibility-select" data-dish-slug="{{ $dish->slug }}">
                                <option value="1" {{ $dish->visibility ? 'selected' : '' }}>Visibile</option>
                                <option value="0" {{ !$dish->visibility ? 'selected' : '' }}>Non visibile</option>
                            </select>
                        </td>
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
                                <a href="{{ route('admin.dishes.edit', $dish->slug) }}" type="button"
                                    class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- MODALE PER ELIMINARE -->
                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm me-2">
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

    <script>
        // Seleziono tutti gli elementi con la classe 'visibility-select'
        document.querySelectorAll('.visibility-select').forEach(select => {

            // Quando l'utente cambia il valore nel selettore, eseguo la funzione
            select.addEventListener('change', function() {

                // Recupero lo slug del piatto e il nuovo valore di visibilità dal selettore
                const dishSlug = this.getAttribute('data-dish-slug');
                const visibility = this.value;

                // Invio una richiesta al server per aggiornare la visibilità del piatto
                fetch(`/admin/dishes/${dishSlug}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-HTTP-Method-Override': 'PUT'
                        },
                        body: JSON.stringify({
                            visibility: visibility
                        }) // Corpo della richiesta con il nuovo valore di visibilità
                    })
                    .then(response => response.json()) // Converti la risposta del server in JSON
                    .then(data => {
                        if (data.success) {
                            // Mostra un messaggio di successo
                            alert('Visibilità aggiornata con successo!');
                        } else {
                            // Mostra un messaggio di errore
                            alert(
                                'Si è verificato un errore durante l\'aggiornamento della visibilità.');
                        }
                    });
            });
        });
    </script>
@endsection
