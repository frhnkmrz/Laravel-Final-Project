@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Add Project Details</h1>
    
    <div class="card p-4 shadow-lg">
        <form action="{{ route('grants.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" name="project_title" class="form-control" required placeholder="Enter project title">
            </div>

            <div class="form-group mb-3">
            <label for="project_leader_id">Project Leader</label>
                <select name="project_leader_id" id="project_leader_id" class="form-control" required>
                    @foreach($academicians as $academician)
                        <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="grant_amount" class="form-label">Grant Amount</label>
                <input type="text" name="grant_amount" class="form-control" required placeholder="Enter grant amount">
            </div>

            <div class="form-group mb-3">
                <label for="grant_provider" class="form-label">Grant Provider</label>
                <input type="text" name="grant_provider" class="form-control" required placeholder="Enter grant provider">
            </div>

            <div class="form-group mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="duration_months" class="form-label">Duration (in months)</label>
                <input type="number" name="duration_months" class="form-control" required placeholder="Enter duration in months">
            </div>

            <!-- Select Project Members -->
            <div class="form-group mb-3">
                <label for="members" class="form-label">Select Project Members</label>
                <select name="members[]" id="members" class="form-control" multiple required>
                    @foreach ($academicians as $academician)
                        <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4 py-2 mt-3">Create Grant</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .form-control {
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 10px;
        font-size: 1rem;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        font-size: 1.1rem;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .form-group.mb-3 {
        margin-bottom: 20px;
    }

    .container {
        max-width: 800px;
        margin-top: 50px;
    }

    h1 {
        font-size: 2rem;
        font-weight: 600;
        color: #343a40;
    }
</style>
@endpush
