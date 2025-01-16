@extends('adminlte::page')

@section('content')
    <h1>Edit About Us Section</h1>

    <form action="{{ route('admin.aboutus.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $about->title }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" value="{{ $about->subtitle }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $about->description }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="bullet_points">Bullet Points</label>
            <input type="text" name="bullet_points" value="{{ $about->bullet_points }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">About Us Image 1</label>
            <input type="file" name="image" class="form-control">
            @if($about->image)
                <img src="{{ asset('img/' . $about->image) }}" alt="About Us Image 1" width="150">
            @endif
        </div>

        <div class="form-group">
            <label for="image">About Us Image 2</label>
            <input type="file" name="image2" class="form-control">
            @if($about->image2)
                <img src="{{ asset('img/' . $about->image2) }}" alt="About Us Image 2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
