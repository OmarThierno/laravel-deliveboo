@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="fs-3 m-0">Accesso effettuato correttamente <span
                                class="fw-semibold text-success">{{ Auth::user()->name }}</span>!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-8 mt-4 mx-auto p-4">
            <div style="width: 600px; margin: auto;">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    <script>
        let priceData = @json($priceData);
    </script>

        <script src="{{ mix('/js/app.js') }}"></script>
    </div>
@endsection
