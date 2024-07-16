@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizzo email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Ti abbiamo inviato un link di verifica al tuo indirizzo email') }}
                    </div>
                    @endif

                    {{ __('Prima di procedere, perfavore controlla la email che ti abbiamo inviato e clicca sul link per verificare il tou account') }}
                    {{ __('Se non hai ricevuto la email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clicca qui per richiedere un altro link di verifica') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
