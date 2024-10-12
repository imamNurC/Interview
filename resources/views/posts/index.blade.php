{{-- @extends('layout.mainlayout') --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <hr>
    <h1>Postingan Random Konten utama </h1>
    <form method="GET" action="{{ route('posts.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." />
        <button type="submit">Search</button>

        <a href="{{ route('posts.create') }}" class="btn btn-primary float-sm-right ">Create Post</a>
    </form>
    <ul class="list-group mt-3">
        @foreach ($posts as $post)
        <div class="col-md-4">
            <li class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Postingan" alt="Postingan [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22347%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20347%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1927fe4c297%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1927fe4c297%22%3E%3Crect%20width%3D%22347%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.19791412353516%22%20y%3D%22120.10000019073486%22%3EPostingan%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">                
                <div class="card-body">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    <p>{{ Str::limit($post->body, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Edit Button -->
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        </div>
        @endforeach
    </ul>

    <hr>
    {{ $posts->links() }}
</div>
@endsection
