@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Grant Details Section -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h1 class="text-center mb-4">Project Details: {{ $grant->project_title }}</h1>

            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Project Leader</th>
                        <td>{{ $grant->projectLeader->name }}</td>
                    </tr>
                    <tr>
                        <th>Grant Amount</th>
                        <td>{{ $grant->grant_amount }}</td>
                    </tr>
                    <tr>
                        <th>Grant Provider</th>
                        <td>{{ $grant->grant_provider }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $grant->start_date }}</td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>{{ $grant->duration_months }} months</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Milestones Section -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Milestones</h2>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Milestone Name</th>
                        <th>Target Completion Date</th>
                        <th>Deliverable</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Date Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grant->milestones as $milestone)
                        <tr>
                            <td>{{ $milestone->milestone_name }}</td>
                            <td>{{ $milestone->target_completion_date }}</td>
                            <td>{{ $milestone->deliverable }}</td>
                            <td>{{ $milestone->status }}</td>
                            <td>{{ $milestone->remark }}</td>
                            <td>{{ $milestone->updated_at }}</td>
                            <td>
                                <a href="{{ route('milestones.edit', ['grantId' => $grant->id, 'milestoneId' => $milestone->id]) }}" 
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Project Members Section -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Project Members</h2>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($grant->members as $academician)
                        <tr>
                            <td>{{ $academician->name }}</td>
                            <td>
                                <form action="{{ route('grants.removeMember', ['grant' => $grant->id, 'academician' => $academician->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this member?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No members added yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Project Member Section -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h3 class="text-center mb-4">Add Project Member</h3>
            <form action="{{ route('grants.addMember', $grant->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="academician_id" class="form-label">Select Academician</label>
                    <select name="academician_id" id="academician_id" class="form-select">
                        @forelse($academicians as $academician)
                            <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                        @empty
                            <option value="">No academicians available</option>
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Add Member</button>
            </form>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center">
        <a href="{{ route('grants.index') }}" class="btn btn-primary btn-lg mt-3">Back to Grants List</a>
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

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .btn-lg {
        font-size: 1.2rem;
        padding: 15px;
    }

    .btn-sm {
        padding: 8px 12px;
        font-size: 0.9rem;
    }

    .form-select, .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .form-label {
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    /* Buttons: Hover effects */
    .btn-warning:hover {
        background-color: #d39e00;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endpush
