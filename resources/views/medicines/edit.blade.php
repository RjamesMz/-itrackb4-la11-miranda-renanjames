@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h3 class="h4 mb-0">Edit Medicine</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('medicines.update', $medicine) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Medicine Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $medicine->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="stock">Stock Quantity</label>
                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                class="form-control @error('stock') is-invalid @enderror"
                                value="{{ old('stock', $medicine->stock) }}"
                                placeholder="Enter stock quantity"
                                min="0"
                                step="1"
                            >
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="expiry_date">Expiry Date</label>
                            <input type="date" id="expiry_date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date', $medicine->expiry_date?->format('Y-m-d')) }}">
                            @error('expiry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="type_id">Type</label>
                            <select id="type_id" name="type_id" class="form-select @error('type_id') is-invalid @enderror">
                                <option value="">Type of Medicine</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        @selected(old('type_id', $medicine->type_id) == $type->id)
                                    >{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="is_available">Available</label>
                            <select
                                id="is_available"
                                name="is_available"
                                class="form-select @error('is_available') is-invalid @enderror"
                            >
                                <option value="">Medicine Status</option>
                                <option value="1" @selected(old('is_available', $medicine->is_available) == '1')>Yes</option>
                                <option value="0" @selected(old('is_available', $medicine->is_available) == '0')>No</option>
                            </select>

                            @error('is_available')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                        <a class="btn btn-outline-secondary px-4" href="{{ route('medicines.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
