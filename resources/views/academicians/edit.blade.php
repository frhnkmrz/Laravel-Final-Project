@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Academician</h1>

    <form action="{{ route('academicians.update', $academician->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $academician->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="staff_number">Staff Number</label>
            <input type="text" name="staff_number" id="staff_number" class="form-control" value="{{ old('staff_number', $academician->staff_number) }}" required>
            @error('staff_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $academician->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="college">College</label>
            <input type="text" name="college" id="college" class="form-control" value="{{ old('college', $academician->college) }}" required>
            @error('college')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $academician->department) }}" required>
            @error('department')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <select name="position" id="position" class="form-control" required>
                <option value="Professor" {{ old('position', $academician->position) == 'Professor' ? 'selected' : '' }}>Professor</option>
                <option value="Assoc Prof" {{ old('position', $academician->position) == 'Assoc Prof' ? 'selected' : '' }}>Associate Professor</option>
                <option value="Senior Lecturer" {{ old('position', $academician->position) == 'Senior Lecturer' ? 'selected' : '' }}>Senior Lecturer</option>
                <option value="Lecturer" {{ old('position', $academician->position) == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
            </select>
            @error('position')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Academician</button>
    </form>
</div>
@endsection
