@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grant Details: {{ $grant->project_title }}</h1>

    <table class="table table-bordered">
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
    </table>

    <h2>Milestones</h2>
    <table class="table table-bordered">
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
            @foreach ($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->milestone_name }}</td>
                    <td>{{ $milestone->target_completion_date }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remark }}</td>
                    <td>{{ $milestone->updated_at }}</td>
                    <td>
                        <a href="{{ route('milestones.edit', [$grant->id, $milestone->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('grants.index') }}" class="btn btn-primary">Back to Grants List</a>
</div>
@endsection
