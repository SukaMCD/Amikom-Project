@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <section>
            <div class="container mt-4">
                <div class="d-flex justify-content-between">
                    <h3>List Publisher</h3>
                    <a href="{{ route('publisher.create') }}" class="btn btn-primary mb-3">Add Publisher</a>
                </div>
                <table class="table mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($publisher as $i => $publisher)
                            <tr>
                                <th scope="publisher">{{ $i + 1 }}</th>
                                <td>{{ $publisher->name }}</td>
                                <td>
                                    <a href="{{ route('publisher.edit', $publisher->id) }}" class="btn btn-success mb-3">Edit</a>
                                    <form action="{{ route('publisher.destroy', $publisher->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this publisher?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-3">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
