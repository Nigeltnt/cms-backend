@extends('adminlte::page')

@section('content')
    
    @if($specs)
    <h1>Edit Specifications Section</h1>

    <form action="{{ route('admin.specs.store', $specs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $specs->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="{{ $specs->description }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="button_text">Icon</label>
            <select id="icon" name="icon" class="form-control">
                <option value="">Select an icon</option>
                <option value="bi bi-display" {{ $specs->icon == 'bi bi-display' ? 'selected' : '' }}>bi bi-display</option>
                <option value="bi bi-feather" {{ $specs->icon == 'bi bi-feather' ? 'selected' : '' }}>bi bi-feathere</option>
                <option value="bi bi-eye" {{ $specs->icon == 'bi bi-eye' ? 'selected' : '' }}>bi bi-eye</option>
                <option value="bi bi-code-square" {{ $specs->icon == 'bi bi-code-square' ? 'selected' : '' }}>bi bi-code-square</option>
                <option value="bi bi-phone" {{ $specs->icon == 'bi bi-phone' ? 'selected' : '' }}>bi bi-phone</option>
                <option value="bi bi-browser-chrome" {{ $specs->icon == 'bi bi-browser-chrome' ? 'selected' : '' }}>bi bi-browser-chrome</option>
                <!-- Add more options as needed -->
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Update Changes</button>
        
    </form>
    <br>

    <button id="create" class="btn btn-primary">Create</button>

    @else
    <h1>Create Specifications Section</h1>

    <form action="{{ route('admin.specs.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="" class="form-control">
        </div>

        <div class="form-group">
            <label for="button_text">Icon</label>
            <select id="icon" name="icon" class="form-control">
                <option value="">Select an icon</option>
                <option value="bi bi-display" >bi bi-display</option>
                <option value="bi bi-feather" >bi bi-feather</option>
                <option value="bi bi-eye" >bi bi-eye</option>
                <option value="bi bi-code-square" >bi bi-code-square</option>
                <option value="bi bi-phone" >bi bi-phone</option>
                <option value="bi bi-browser-chrome" >bi bi-browser-chrome</option>
                <!-- Add more options as needed -->
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    @endif
@endsection


<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('create').addEventListener('click', function() {
        // Gather input values
        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;
        const icon = document.getElementById('icon').value;

        // Create a data object
        const data = {
            name: name,
            description: description,
            icon: icon
        };

        console.log(data);
        // Send the data using fetch
        fetch('/admin/specs/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if necessary
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            // Optionally, clear the form or show a success message
            //document.getElementById('myForm').reset();
        })
        .catch((error) => {
            console.error('Error:', error);
            // Optionally, show an error message
        });
    });
});
</script>