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
}
