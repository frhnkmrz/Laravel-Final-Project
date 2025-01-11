@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Add New Academician</h1>

    <form action="{{ route('academicians.store') }}" method="POST">
        @csrf
        
        <div class="card shadow-lg p-4 mb-4">
            <div class="card-body">

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="staff_number" class="form-label">Staff Number</label>
                    <input type="text" name="staff_number" id="staff_number" class="form-control @error('staff_number') is-invalid @enderror" value="{{ old('staff_number') }}" required>
                    @error('staff_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="college" class="form-label">College</label>
                    <input type="text" name="college" id="college" class="form-control @error('college') is-invalid @enderror" value="{{ old('college') }}" required>
                    @error('college')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" id="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}" required>
                    @error('department')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select name="position" id="position" class="form-select @error('position') is-invalid @enderror" required>
                        <option value="Professor" {{ old('position') == 'Professor' ? 'selected' : '' }}>Professor</option>
                        <option value="Assoc Prof" {{ old('position') == 'Assoc Prof' ? 'selected' : '' }}>Associate Professor</option>
                        <option value="Senior Lecturer" {{ old('position') == 'Senior Lecturer' ? 'selected' : '' }}>Senior Lecturer</option>
                        <option value="Lecturer" {{ old('position') == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                    </select>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100">Save Academician</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    /* Card Styling */
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    /* Input Fields */
    .form-control, .form-select {
        border-radius: 8px;
        padding: 10px;
        font-size: 1rem;
    }

    /* Button Styling */
    .btn-success {
        font-size: 1.1rem;
        padding: 12px;
        font-weight: bold;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    /* Invalid Input */
    .is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: #dc3545;
    }

    /* Form Label Styling */
    .form-label {
        font-weight: 500;
        margin-bottom: 5px;
    }
</style>
@endpush
