@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Milestone for Grant: {{ $grant->project_title }}</h1>
    <form method="POST" action="{{ route('milestones.update', ['grantId' => $grant->id, 'milestoneId' => $milestone->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="milestone_name" class="form-label">Milestone Name</label>
            <input type="text" class="form-control" id="milestone_name" name="milestone_name" value="{{ $milestone->milestone_name }}" disabled>
        </div>

        <div class="mb-3">
            <label for="target_completion_date" class="form-label">Target Completion Date</label>
            <input type="date" class="form-control" id="target_completion_date" name="target_completion_date" value="{{ $milestone->target_completion_date }}" disabled> 
        </div>

        <div class="mb-3">
            <label for="deliverable" class="form-label">Deliverable</label>
            <input type="text" class="form-control" id="deliverable" name="deliverable" value="{{ $milestone->deliverable }}" disabled>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Pending" {{ $milestone->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $milestone->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $milestone->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="remark" class="form-label">Remarks</label>
            <textarea class="form-control" id="remark" name="remark">{{ $milestone->remark }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Milestone</button>
    </form>
</div>
@endsection
