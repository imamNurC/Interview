@extends('layout.mainlayout')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <h4>Komentar warga :</h4>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->comment }}</li>
        @endforeach
    </ul>

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
