@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <section>
            <div class="container mt-4">
                <div class="d-flex justify-content-between">
                    <h3>List Books</h3>
                    <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Add book</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date Of Publish</th>
                            <th scope="col">Total Pages</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($book as $i => $book)
                            <tr>
                                <th scope="book">{{ $i + 1 }}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author?->name }}</td>
                                <td>{{ $book->date_of_publish }}</td>
                                <td>{{ $book->total_page }}</td>
                                <td>
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success mb-3">Edit</a>
                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this book?');">
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