@extends('layouts.app')
@section('content')

<div class="jumbotron background-home p-5 mb-4 bg-light rounded-3">
    <div class="container welcome py-5">
        <h1 class="display-5 fw-bold ">
            Ti diamo il benvenuto su DeliveBoo &hearts;
        </h1>

        <p class="col-md-8 fs-4">In questa sezione potrai accedere al tuo account, oppure registrarti al nostro servizio!
            <i class="fa-solid fa-utensils"></i>
        </p>
        <button class="btn btn-success btn-lg" type="button"> <a class="nav-link" href="{{ route('register') }}">{{ __('Inizia subito!') }}</a></button>
    </div>
</div>

<div class="content text-center">
    
        <span>&copy; 2024 Deliveboo </span> <br>
        <span>Tutti i diritti riservati</span>
    
</div>
@endsection
