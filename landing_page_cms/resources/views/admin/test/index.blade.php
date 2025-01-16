@extends('adminlte::page')

@section('content')
    
    @if($testy)
    <h1>Edit Testimonials Section</h1>

    <form action="{{ route('admin.testimony.store', $testy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $testy->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Position</label>
            <input id="description" type="text" name="description" value="{{ $testy->position }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="testimony">Testimony</label>
            <input id="testimony" type="text" name="testimony" value="{{ $testy->testimony }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="image"> Image</label>
            <input type="file" name="image" class="form-control">
            @if($testy->image)
                <img src="{{ asset('img/' . $testy->image) }}" alt=" Image" width="150">
            @endif
        </div>


        <button type="submit" class="btn btn-primary">Update Changes</button>
        
    </form>
    <br>

    <button id="create" class="btn btn-primary">Create</button>

    @else
    <h1>Create Testimonials Section</h1>

    <form action="{{ route('admin.testimony.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $testy->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Position</label>
            <input id="description" type="text" name="description" value="{{ $testy->position }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="testimony">Testimony</label>
            <input id="testimony" type="text" name="testimony" value="{{ $testy->testimony }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="image"> Image</label>
            <input type="file" name="image" class="form-control">
            @if($testy->image)
                <img src="{{ asset('img/' . $testy->image) }}" alt=" Image" width="150">
            @endif
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
        fetch('/admin/testimony/store', {
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