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

                        <p class="fs-3 m-0">You are logged in <span class="fw-semibold text-primary">{{ Auth::user()->name }}</span>!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
