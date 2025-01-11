@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Create Milestone for Grant: {{ $grant->project_title }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('milestones.store', $grant->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="milestone_name" class="form-label">Milestone Name</label>
                            <input type="text" name="milestone_name" class="form-control rounded-3" id="milestone_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="target_completion_date" class="form-label">Target Completion Date</label>
                            <input type="date" name="target_completion_date" class="form-control rounded-3" id="target_completion_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="deliverable" class="form-label">Deliverable</label>
                            <input type="text" name="deliverable" class="form-control rounded-3" id="deliverable" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success btn-lg mt-3">Save Milestone</button>
                            <a href="{{ route('grants.index') }}" class="btn btn-secondary btn-lg mt-3">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
