@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h1>Index Orders</h1>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome Cognome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Stato</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->name }} {{ $order->surname }}</th>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->address }}</td>
                            <td>
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option @selected($order->status === 'running') value="running">Incorso</option>
                                        <option @selected($order->status === 'completed') value="completed">Completato</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-success btn-sm d-none d-md-inline">Mostra</a>
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-success btn-sm d-inline d-md-none">Mostra</a>
                                {{-- _____________________________ --}}
                                
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
