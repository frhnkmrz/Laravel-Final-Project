@extends('layouts.app')

@section('content')


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-3 text-primary mb-4 fw-bold">Welcome to the Research Grant Management System</h1>
            <p class="lead text-muted mb-4">Manage research grants, project leaders, and milestones with ease.</p>
            <p class="text-muted mb-5">Navigate through the sections below to get started:</p>

            <div class="d-flex justify-content-center gap-5">
                <a href="{{ route('academicians.index') }}" class="btn btn-lg btn-outline-primary px-5 py-3 rounded-pill shadow hover-shadow-lg">Manage Academicians</a>
                <a href="{{ route('grants.index') }}" class="btn btn-lg btn-outline-success px-5 py-3 rounded-pill shadow hover-shadow-lg">Manage Research Grants</a>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar {
        background-color: #0056b3 !important;
    }

    .navbar-nav .nav-link {
        color: #fff !important;
    }

    .navbar-nav .nav-link:hover {
        color: #f8f9fa !important;
        text-decoration: underline;
    }

    .btn-outline-primary, .btn-outline-success {
        border-width: 2px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .hover-shadow-lg:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
