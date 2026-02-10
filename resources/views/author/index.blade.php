@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <section>
            <div class="container mt-4">
                <div class="d-flex justify-content-between">
                    <h3>List Author</h3>
                    <a href="{{ route('author.create') }}" class="btn btn-primary mb-3">Add Author</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($author as $i => $author)
                            <tr>
                                <th scope="author">{{ $i + 1 }}</th>
                                <td>{{ $author->name }}</td>
                                <td>
                                    <a href="{{ route('author.edit', $author->id) }}" class="btn btn-success mb-3">Edit</a>
                                    <form action="{{ route('author.destroy', $author->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this author?');">
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
