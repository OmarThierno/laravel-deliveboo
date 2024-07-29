@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Index Orders</h1>
            {{-- <form id="filter" action="{{route('admin.orders.index')}}" method="GET">
                @csrf
                <select aria-label="Default select example" name="fillter">
                    <option selected>Filtra per stato</option>
                    <option value="running">Incorso</option>
                    <option value="completed">Completato</option>
                </select>
            </form> --}}
        </div>

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
                                    <input @checked($order->status === 'running') class="orderSelectStatus" id="incorso"
                                        type="radio" name="status" value="running">
                                    <label class="me-2" for="incorso">Incorso</label>

                                    <input @checked($order->status === 'completed') class="orderSelectStatus" id="completato"
                                        type="radio" name="status" value="completed">
                                    <label for="completato">Completato</label>
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
        <div class="d-flex justify-content-end m-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
