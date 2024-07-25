@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card py-3 px-3">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <h1>{{ $order->name }} {{ $order->surname }}</h1>
                    <h4>#{{ $order->id }}</h4>
                </div>
                <form action="{{ route('admin.orders.update', $order->id) }}">
                    <select class="form-select" aria-label="Default select example">
                        <option @selected($order->status === 'running') value="running">Incorso</option>
                        <option @selected($order->status === 'completed') value="completed">Completato</option>
                    </select>
                </form>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Indirizzo:</dt>
                    <dd>{{ $order->address }}</dd>
                    <dt>Numero di telefono:</dt>
                    <dd>{{ $order->phone_number }}</dd>
                </dl>
                <hr>
                <h5 class="card-title">Ordine</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Piatto</th>
                            <th scope="col">Quantità</th>
                            <th scope="col">Prezzo</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($collection as $item) --}}
                        {{-- @dd($order->dishes()) --}}
                            <tr>
                                <th scope="row">#</th>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
