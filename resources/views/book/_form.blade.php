@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <form action="{{ $action }}" method="POST">

            @csrf
            @if ($method != 'POST')
                @method($method)
            @endif

            <div class="row">
                <!-- start title -->
                <div class="col-6 mb-2 form-group">
                    <label for="name">Name Of Books</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $book->title ?? old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- end title -->

                <!-- start author -->
                <div class="col-6 mb-2 form-group">
                    <label for="author_id">Author</label>
                    <select name="author_id" id="author_id" class="form-control">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- end author -->

                <!-- start date of publish -->
                <div class="col-6 mb-2 form-group">
                    <label for="date_of_publish">Date Of Publish</label>
                    <input type="date" class="form-control" name="date_of_publish" id="date_of_publish"
                        value="{{ old('date_of_publish', $book->date_of_publish) }}">
                    @error('date_of_publish')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- end date of publish -->

                <!-- start total page -->
                <div class="col-6 mb-2 form-group">
                    <label for="total_page">Total Page</label>
                    <input type="number" class="form-control" name="total_page" id="total_page"
                        value="{{ old('total_page', $book->total_page) }}">
                    @error('total_page')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- end total page -->

                <!-- start description -->
                <div class="col-6 mb-2 form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"
                        rows="3">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- end description -->
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
