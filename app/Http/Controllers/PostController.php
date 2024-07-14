<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostLikedNotification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    public function create()
    {
        return Inertia::modal('CreatePost')->baseRoute('home');
    }

    public function store()
    {

        if (count(request('media')) > 1) {
            abort(403);
        }

        $data = \request()->validate([
            'media.*' => 'required|mimes:jpeg,jpg,png,mp4|max:2048',
            'description' => 'required|nullable|max:500',
            'location' => 'nullable|max:100',
            'hide_likes_count' => 'nullable|boolean',
            'allow_commenting' => 'nullable|boolean',
        ]);

        $post = Post::create([
            ...Arr::except($data, ['media']),
            'user_id' => auth()->id(),
            'type' => $this->getPostType($data['media']),
        ]);

        $path = $data['media'][0]->store('media', 'public');
        $url = url(Storage::url($path));

        $post->media()->create([
            'url' => $url,
            'type' => $this->getMime($data['media']),
        ]);

        session()->flash('flash.banner', 'Post created successfully.');

        return to_route('home');
    }

    private function getPostType($media)
    {
        if (str()->contains($media[0]->getMimeType(), 'video')) {
            return 'reel';
        } else {
            return 'post';
        }
    }

    public function toggleLike(Post $post)
    {
        auth()->user()->toggleLike($post);

        if ($post->isLikedBy(auth()->user())) {
            if ($post->user->id !== auth()->id()) {
                $post->user->notify(new PostLikedNotification(auth()->user(), $post));
            }
        }

        return back();
    }

    public function toggleFavorite(Post $post)
    {
        auth()->user()->toggleFavorite($post);

        return back();
    }

    private function getMime($media): string
    {
        if (str()->contains($media[0]->getMimeType(), 'video')) {
            return 'video';
        } else {
            return 'image';
        }
    }
}
