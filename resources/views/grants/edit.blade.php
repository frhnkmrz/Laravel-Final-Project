@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Edit Grant Form Section -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h1 class="text-center mb-4">Edit Grant</h1>

            <form action="{{ route('grants.update', $grant) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="project_title" class="form-label">Project Title</label>
                    <input type="text" name="project_title" class="form-control" value="{{ old('project_title', $grant->project_title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="project_leader_id" class="form-label">Project Leader</label>
                    <select name="project_leader_id" class="form-select" required>
                        @foreach ($academicians as $academician)
                            <option value="{{ $academician->id }}" {{ $academician->id == $grant->project_leader_id ? 'selected' : '' }}>{{ $academician->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="grant_amount" class="form-label">Grant Amount</label>
                    <input type="text" name="grant_amount" class="form-control" value="{{ old('grant_amount', $grant->grant_amount) }}" required>
                </div>

                <div class="mb-4">
                    <label for="grant_provider" class="form-label">Grant Provider</label>
                    <input type="text" name="grant_provider" class="form-control" value="{{ old('grant_provider', $grant->grant_provider) }}" required>
                </div>

                <div class="mb-4">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $grant->start_date) }}" required>
                </div>

                <div class="mb-4">
                    <label for="duration_months" class="form-label">Duration (in months)</label>
                    <input type="number" name="duration_months" class="form-control" value="{{ old('duration_months', $grant->duration_months) }}" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg px-5 py-3">Update Grant</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-select, .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn-lg {
        font-size: 1.2rem;
        padding: 15px;
    }

    /* Button Hover */
    .btn-success:hover {
        background-color: #218838;
    }

    .text-center {
        text-align: center;
    }

    .mb-4 {
        margin-bottom: 30px;
    }
</style>
@endpush
