<form action="{{ $action }}" method="POST">

    @csrf
    @if ($method != 'POST')
        @method($method)
    @endif

    <div class="row">
        <div class="col-6 form-group">
            <label for="name">Name Of Author</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $author->name ?? '' }}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>