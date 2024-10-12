@extends('custom_layout.mainlayout')
@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <h4>Komentar warga :</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post->comments as $comment)
                <tr>
                    <td>{{ $comment->comment }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Komen Postingan</label>
            <textarea class="form-control" name="comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
