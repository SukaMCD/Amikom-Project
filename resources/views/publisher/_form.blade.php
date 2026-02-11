@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <form action="{{ $action }}" method="POST">

            @csrf
            @if ($method != 'POST')
                @method($method)
            @endif

            <div class="row">
                <div class="col-6 mb-2 form-group">
                    <label for="name">Name Of Publisher</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $publisher->name ?? old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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