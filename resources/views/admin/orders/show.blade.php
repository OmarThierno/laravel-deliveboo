@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
      <div class="d-flex align-items-center gap-3">
        <h1>{{$order->name}} {{$order->surname}}</h1> 
        <h4>#{{$order->id}}</h4>
      </div>


    </div>
@endsection