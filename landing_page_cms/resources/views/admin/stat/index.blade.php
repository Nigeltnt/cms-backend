@extends('adminlte::page')

@section('content')
    
    @if($stat)
    <h1>Edit Stats Section</h1>

    <form action="{{ route('admin.stats.update', $stat->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $stat->name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input id="description" type="text" name="description" value="{{ $stat->description }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="icon">Icon</label>
        <select id="icon" name="icon" class="form-control" required>
            <option value="">Select an icon</option>
            <option value="bi bi-trophy" {{ $stat->icon == 'bi bi-trophy' ? 'selected' : '' }}>bi bi-trophy</option>
            <option value="bi bi-briefcase" {{ $stat->icon == 'bi bi-briefcase' ? 'selected' : '' }}>bi bi-briefcase</option>
            <option value="bi bi-graph-up" {{ $stat->icon == 'bi bi-graph-up' ? 'selected' : '' }}>bi bi-graph-up</option>
            <option value="bi bi-award" {{ $stat->icon == 'bi bi-award' ? 'selected' : '' }}>bi bi-award</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Changes</button>
</form>
    <br>

    <button id="create" class="btn btn-primary">Create</button>

    @else
    <h1>Create Stats Section</h1>

    <form action="{{ route('admin.stats.store') }}" method="POST" enctype="multipart/form-data">
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
                <option value="bi bi-trophy" >bi bi-trophy</option>
                <option value="bi bi-briefcase" >bi bi-briefcase</option>
                <option value="bi bi-graph-up" >bi bi-graph-up</option>
                <option value="bi bi-award" >bi bi-award</option>
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
        fetch('/admin/stats/store', {
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