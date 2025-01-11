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
<div class="container mt-4">

    <h1 class="text-center mb-4 text-dark">Academicians</h1>

    <div class="mb-4">
        <a href="{{ route('academicians.create') }}" class="btn btn-lg btn-primary"><i class="bi bi-plus-circle"></i> Add New Academicians</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Staff Number</th>
                        <th>Email</th>
                        <th>College</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($academicians as $academician)
                        <tr>
                            <td>{{ $academician->name }}</td>
                            <td>{{ $academician->staff_number }}</td>
                            <td>{{ $academician->email }}</td>
                            <td>{{ $academician->college }}</td>
                            <td>{{ $academician->department }}</td>
                            <td>{{ $academician->position }}</td>
                            <td>
                                <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $academicians->links() }}
    </div>
</div>
@endsection
