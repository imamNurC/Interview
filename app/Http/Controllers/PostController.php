<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        DB::beginTransaction();

        try {
            $posts = Post::with('comments')
                ->when($search, function ($query) use ($search) {
                    return $query->where('title', 'like', "%{$search}%")
                        ->orWhere('body', 'like', "%{$search}%");
                })
                ->paginate(10);

            DB::commit();

            return view('posts.index', compact('posts', 'search'));
        } catch (\Exception $e) {
            DB::rollback();

            // Log::error($e->getMessage());

            return redirect()->route('posts.index')->with('error', 'Human Friendly Message');
        }
    }

    public function show(Post $post)
    {
        return view('comments.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        try {
            DB::beginTransaction();
            Post::create($request->only(['title', 'body']));
            DB::commit();

            return redirect()->route('posts.index')->with('success', 'Postingan Baru di tambahkan.');
        } catch (\Exception $e) {
            DB::rollback();

            // Log::error($e->getMessage());

            return redirect()->route('posts.create')->with('error', 'Human error friendly message');
        }
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
        // return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $post->update($request->only(['title', 'body']));
            DB::commit();

            return response()->json([
                'message' => 'Post updated successfully.',
                'redirect_url' => route('posts.index')
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Failed to update post.'], 500);
        }
    }

    public function destroy(Post $post)
    {
        DB::beginTransaction();

        try {
            $post->delete();

            DB::commit();

            return redirect()->route('posts.index')->with('success', 'Postingan telah di hapus.');
            // return response()->json(['message' => 'Post deleted successfully.']);
            // return response()->json([
            //     'message' => 'Post berhasil di hapus',
            //     'redirect_url' => route('posts.index')
            // ]);
        } catch (\Exception $e) {
            DB::rollback();
            // Log::error($e->getMessage());

            return response()->json(['error' => 'Failed to delete post.'], 500);
        }
    }
}
