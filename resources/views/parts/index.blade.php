@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Parts</h1>
        <form method="GET" action="{{ route('parts.index') }}" class="mb-4">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="serialnumber" placeholder="Serial Number" value="{{ request('serialnumber') }}">
                </div>
                <div class="col">
                    <select class="form-control" name="car_id">
                        <option value="">All Cars</option>
                        @foreach(App\Models\Car::all() as $car)
                            <option value="{{ $car->id }}" {{ request('car_id') == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <label for="primary">A Primary Button</label>
            </div>
            <div class="col-md-6">
                <button name="primary" type="button" class="btn btn-primary btn-block ">
                    Primary Button
                </button>
            </div>
        </div>
        <a href="{{ route('parts.create') }}" class="btn btn-primary mb-2">Add Part</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Serial Number</th>
                <th>Car</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parts as $part)
                <tr>
                    <td>{{ $part->name }}</td>
                    <td>{{ $part->serialnumber }}</td>
                    <td>{{ $part->car->name }}</td>
                    <td>
                        <a href="{{ route('parts.edit', $part) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('parts.destroy', $part) }}" method="POST" style="display:inline;">
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
