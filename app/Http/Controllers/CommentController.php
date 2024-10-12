<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            Comment::create([
                'post_id' => $postId,
                'comment' => $request->comment,
            ]);
            DB::commit();

            return redirect()->route('posts.show', $postId)->with('success', 'komentar Baru di tambahkan.');
        } catch (\Exception $e) {
            DB::rollback();

            // Log::error($e->getMessage());

            return redirect()->route('posts.create')->with('error', 'Human error friendly message');
        }
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $comment->update([
                'comment' => $request->comment,
            ]);
            DB::commit();

            return redirect()->route('posts.show', $comment->post_id)->with('success', 'Komentar diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('posts.show', $comment->post_id)->with('error', 'Terjadi kesalahan.');
        }
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        try {
            DB::beginTransaction();

            $comment->delete();

            DB::commit();
            return redirect()->route('posts.show', $postId)->with('success', 'Komentar dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('posts.show', $postId)->with('error', 'Terjadi kesalahan.');
        }
    }
}
