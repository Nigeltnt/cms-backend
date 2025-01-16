@extends('adminlte::page')

@section('content')
    <div class="card card-primary mt-4">
    <div class="card-header">
                <h3 class="card-title">Add new feature</h3>
              </div>
        <div class="card-body">
        <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Html Body</label>
            <input type="text" name="html" value="{{ old('html') }}" class="form-control">
            @error('html')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Feature Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>
    </div>
@endsection