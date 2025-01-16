@extends('adminlte::page')

@section('content')
    <h1>Edit Hero Section</h1>

    <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $hero->title }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" value="{{ $hero->subtitle }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $hero->description }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="button_text">Button Text</label>
            <input type="text" name="button_text" value="{{ $hero->button_text }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Hero Image</label>
            <input type="file" name="image" class="form-control">
            @if($hero->image)
                <img src="{{ asset('img/' . $hero->image) }}" alt="Hero Image" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
