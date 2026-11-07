@extends('layouts.app')

@section('title', $medicine['name'])

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h3 class="h4 mb-0">{{ $medicine['name'] }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <span class="text-muted">Stock</span>
                    <span class="fw-semibold">{{ $medicine['stock'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <span class="text-muted">Expiry Date</span>
                    <span class="fw-semibold">{{ $medicine['expiry_date'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <span class="text-muted">Type</span>
                    <span class="badge bg-info-subtle text-info-emphasis">{{ $medicine->type?->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <span class="text-muted">Available</span>
                    <span class="fw-semibold">{{ $medicine['is_available'] ? 'Yes' : 'No' }}</span>
                </li>
            </ul>
            <div class="card-footer bg-body py-3">
                <a href="{{ route('medicines.index') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>

    </div>
</div>
@endsection
