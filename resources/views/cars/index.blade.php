@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cars</h1>
        <form method="GET" action="{{ route('cars.index') }}" class="mb-4">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="registration_number" placeholder="Registration Number" value="{{ request('registration_number') }}">
                </div>
                <div class="col">
                    <select class="form-control" name="is_registered">
                        <option value="">All</option>
                        <option value="1" {{ request('is_registered') == '1' ? 'selected' : '' }}>Registered</option>
                        <option value="0" {{ request('is_registered') == '0' ? 'selected' : '' }}>Not Registered</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-2">Add Car</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Registration Number</th>
                <th>Is Registered</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->registration_number }}</td>
                    <td>{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
