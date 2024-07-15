@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Create Restaurant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.restaurants.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">  
                    <label for="thumb" class="form-label fw-semibold">Image</label>
                    <input type="file" class="form-control" id="thumb" name="thumb">
                </div>
                <div class="mb-3">
                    <label for="vat_number" class="form-label">VAT Number</label>
                    <input type="number" class="form-control" id="vat_number" name="vat_number" required>
                </div>
                <div class="mb-3">
                    <label for="typology_name" class="form-label">Typology</label>
                    <input type="text" class="form-control" id="typology_name" name="typology_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
