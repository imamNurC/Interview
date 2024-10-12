@extends('custom_layout.mainlayout')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form id="edit-post-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" required>{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
document.getElementById('edit-post-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('{{ route("posts.update", $post) }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirect_url) {
            window.location.href = data.redirect_url;
        } else {
            alert(data.error || 'Unexpected error occurred');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
@endsection
