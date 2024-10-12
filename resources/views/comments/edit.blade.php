@extends('custom_layout.mainlayout')

@section('content')
<div class="container">
    <h1>Edit Komentar</h1>
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea class="form-control" name="comment" required>{{ old('comment', $comment->comment) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
