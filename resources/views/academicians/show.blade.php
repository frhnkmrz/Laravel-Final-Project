@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Academician Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $academician->name }}</h2>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Staff Number:</strong> {{ $academician->staff_number }}</li>
                <li><strong>Email:</strong> {{ $academician->email }}</li>
                <li><strong>College:</strong> {{ $academician->college }}</li>
                <li><strong>Department:</strong> {{ $academician->department }}</li>
                <li><strong>Position:</strong> {{ $academician->position }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
