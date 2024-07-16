@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Ti diamo il benvenuto su DeliveBoo.
        </h1>

        <p class="col-md-8 fs-4">In questa sezione potrai accedere al tuo account, oppure registrarti al nostro servizio!</p>
        <button class="btn btn-success btn-lg" type="button"> <a class="nav-link" href="{{ route('register') }}">{{ __('Inizia subito!') }}</a></button>
    </div>
</div>

<div class="content">
    <div class="container">
        {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p> --}}
    </div>
</div>
@endsection
