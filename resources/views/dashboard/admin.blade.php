@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-3 text-primary mb-4 fw-bold">Admin Dashboard</h1>
            <p class="lead text-muted mb-4">View and manage all the research activities, including grants, milestones, and academicians.</p>
            <p class="text-muted mb-5">Navigate through the sections below to get started:</p>

            <h3 class="mb-3">Manage Academician</h3>
            <div class="d-flex justify-content-center gap-5">
                <a href="{{ route('academicians.index') }}" class="btn btn-lg btn-outline-success px-5 py-3 rounded-pill shadow hover-shadow-lg">View Academician</a>
            </div>

            <div class="mt-4">
                <h3 class="mb-3">Manage Grants</h3>
                <a href="{{ route('grants.index') }}" class="btn btn-lg btn-outline-primary mb-3 px-5 py-3 rounded-pill shadow hover-shadow-lg">View Grants</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
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

        .btn-outline-primary, .btn-outline-success, .btn-outline-info {
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
