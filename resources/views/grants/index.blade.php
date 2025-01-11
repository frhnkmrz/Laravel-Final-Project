@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('academicians.index') }}">Academicians</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('grants.index') }}">Grants</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center mb-4">Grants Management</h1>
    
    <div class="mb-4">
        <a href="{{ route('grants.create') }}" class="btn btn-lg btn-primary"><i class="bi bi-plus-circle"></i> Add New Projects Details</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Project Leader</th>
                    <th>Project Members</th>
                    <th>Milestones</th>
                    <th>Grant Amount</th>
                    <th>Grant Provider</th>
                    <th>Start Date</th>
                    <th>Duration (Months)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grants as $grant)
                <tr>
                    <td>{{ $grant->project_title }}</td>
                    <td>{{ $grant->projectLeader->name }}</td>
                    <td>
                        @foreach($grant->members as $member)
                            <span class="badge bg-secondary">{{ $member->name }}</span>
                            @if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($grant->milestones as $milestone)
                            <div>{{ $milestone->milestone_name }} <small>({{ $milestone->status }})</small></div>
                        @endforeach
                        <br>
                        <a href="{{ route('milestones.create', $grant->id) }}" class="btn btn-sm btn-info">Add Milestone</a>
                    </td>
                    <td>{{ $grant->grant_amount }}</td>
                    <td>{{ $grant->grant_provider }}</td>
                    <td>{{ $grant->start_date }}</td>
                    <td>{{ $grant->duration_months }}</td>
                    <td>
                        <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" style="display:inline-block;">
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
@endsection
