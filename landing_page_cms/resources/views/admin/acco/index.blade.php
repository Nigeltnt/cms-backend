@extends('adminlte::page')

@section('content')
    
    @if($acco)
    <h1>Edit Accolades Section</h1>

    <form action="{{ route('admin.accolades.store', $acco->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $acco->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="{{ $acco->description }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="button_text">Icon</label>
            <select id="icon" name="icon" class="form-control">
                <option value="">Select an icon</option>
                <option value="bi bi-award" {{ $acco->icon == 'bi bi bi-award' ? 'selected' : '' }}>bi bi-award</option>
                <option value="bi bi-patch-check" {{ $acco->icon == 'bi bi-patch-check' ? 'selected' : '' }}>bi bi-patch-check</option>
                <option value="bi bi-sunrise" {{ $acco->icon == 'bi bi-sunrise' ? 'selected' : '' }}>bi bi-sunrise</option>
                <option value="bi bi-shield-check" {{ $acco->icon == 'bi bi-shield-check' ? 'selected' : '' }}>bi bi-shield-check</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="button_text">Color</label>
            <select id="color" name="color" class="form-control">
                <option value="">Select a color</option>
                <option value="feature-box orange" {{ $acco->color == 'feature-box orange' ? 'selected' : '' }}>feature-box orange</option>
                <option value="feature-box blue" {{ $acco->color == 'feature-box blue' ? 'selected' : '' }}>feature-box blue</option>
                <option value="feature-box green" {{ $acco->color == 'feature-box green' ? 'selected' : '' }}>feature-box green</option>
                <option value="feature-box red" {{ $acco->color == 'feature-box red' ? 'selected' : '' }}>feature-box red</option>
                <!-- Add more options as needed -->
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Update Changes</button>
        
    </form>
    <br>

    <button id="create" class="btn btn-primary">Create</button>

    @else
    <h1>Create Accolades Section</h1>

    <form action="{{ route('admin.accolades.store') }}" method="POST" enctype="multipart/form-data">
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
                <option value="bi bi-award" >bi bi-award</option>
                <option value="bi bi-patch-check" >bi bi-patch-check</option>
                <option value="bi bi-sunrise" >bi bi-sunrise</option>
                <option value="bi bi-shield-check" >bi bi-shield-check</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="button_text">Color</label>
            <select id="color" name="color" class="form-control">
                <option value="">Select a color</option>
                <option value="feature-box orange" >feature-box orange</option>
                <option value="feature-box blue" >feature-box blue</option>
                <option value="feature-box green" >feature-box green</option>
                <option value="feature-box red" >feature-box red</option>
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
        const color = document.getElementById('color').value;            
        

        // Create a data object
        const data = {
            name: name,
            description: description,
            icon: icon,
            color: color
        };

        console.log(data);
        // Send the data using fetch
        fetch('/admin/accolades/store', {
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