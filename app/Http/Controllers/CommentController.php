<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);

        $post = Post::find($request->post_id);

        // Cek apakah pengguna memiliki akses ke posting ini
        if (!Auth::user()->posts->contains($post)) {
            return redirect()->route('posts.show', ['slug' => $post->slug])
                ->with('error', 'You do not have access to comment on this post.');
        }

        $existingComment = Comment::where('post_id', $request->post_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingComment) {
            return redirect()->route('posts.show', ['slug' => $post->slug])
                ->with('error', 'You have already commented on this post.');
        }

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', ['slug' => $post->slug])
            ->with('success', 'Comment posted successfully.');
    }

    public function edit(Comment $comment)
    {
        // Dicek apakah komentarnya punya dia
        if ($comment->user_id !== Auth::id()) {
            return redirect()->route('posts.show', ['slug' => $comment->post->slug])
                ->with('error', 'not authorized');
        }

        return view('posts.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Dicek apakah komentarnya punya dia
        if ($comment->user_id !== Auth::id()) {
            return redirect()->route('posts.show', ['slug' => $comment->post->slug])
                ->with('error', 'You are not authorized to update this comment.');
        }

        $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', ['slug' => $comment->post->slug])
            ->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return redirect()->route('posts.show', ['slug' => $comment->post->slug])
                ->with('error', 'not authorized');
        }

        $comment->delete();

        return redirect()->route('posts.show', ['slug' => $comment->post->slug])
            ->with('success', 'Comment deleted successfully.');
    }
}