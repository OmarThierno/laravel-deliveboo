@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card py-3 px-3">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <h1>{{ $order->name }} {{ $order->surname }}</h1>
                    <h4>#{{ $order->id }}</h4>
                </div>
                <h4 class="me-3">{{ $order->status }}</h4>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Indirizzo:</dt>
                    <dd>{{ $order->address }}</dd>
                    <dt>Numero di telefono:</dt>
                    <dd>{{ $order->phone_number }}</dd>
                    <dt>Data:</dt>
                    <dd>{{ $order->order_date }}</dd>
                    <dt>Ora:</dt>
                    <dd>{{ date_format($order->created_at, 'H:i:s') }}</dd>
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
                        {{-- @dd($order->dishes()->withPivot('quantity')->get()) --}}
                        @foreach ($order->dishes()->withPivot('quantity')->get() as $dish)
                            <tr>
                                <th scope="row">{{ $dish->name }}</th>
                                <td>{{ $dish->pivot->quantity }}</td>
                                <td>{{ number_format($dish->pivot->quantity * $dish->price, 2, '.') }}€</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="d-flex justify-content-end mt-5">Totale: {{ $order->price }}€</h4>
            </div>
        </div>
    </div>
@endsection
