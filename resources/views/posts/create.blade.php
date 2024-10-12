@extends('layout.mainlayout')
{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body postingan</label>
            <textarea class="form-control" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<script>
    document.getElementById('create-post-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
    
        const formData = new FormData(this);
    
        fetch('{{ route("posts.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirect_url) {
                // Redirect the user to the provided URL
                window.location.href = data.redirect_url;
            } else {
                // Handle any errors
                alert(data.error || 'Unexpected error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script>
@endsection
