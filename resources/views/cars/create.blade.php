@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Car</h1>
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="registration_number">Registration Number</label>
                <input type="text" class="form-control" id="registration_number" name="registration_number">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="is_registered" name="is_registered">
                <label class="form-check-label" for="is_registered">Is Registered</label>
            </div>
            <button type="submit" class="btn btn-primary">Add Car</button>
        </form>
    </div>
@endsection