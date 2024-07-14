<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewCommentNotification;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function show(Post $post)
    {
        $comments = $post->comments()->with('user')->with('post')->latest()->paginate(20);
        $attachedPost = $post->load('media', 'user');
        auth()->user()->attachLikeStatus($post);
        auth()->user()->attachFavoriteStatus($post);

        return Inertia::modal('ShowComments')->with([
            'comments' => fn () => $comments,
            'post' => fn () => $attachedPost,
            'likes_count' => $post->likers()->count(),
        ])->baseRoute('home');
    }

    public function store(Post $post)
    {

        if ($post->allow_commenting) {
            abort(403);
        }

        $data = request()->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            ...$data,
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        if ($post->user->id !== auth()->id()) {
            $post->user->notify(new NewCommentNotification(auth()->user(), $comment));
        }

        return back();

    }
}
