<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function showPosts(User $user)
    {

        auth()->user()->attachFollowStatus($user);

        $posts = $user->posts()->where('type', 'post')->withLikersCount()->with('media')->paginate(12);

        return Inertia::render('IgProfile/ProfilePosts', ['user' => fn () => $user, 'posts' => $posts]);
    }

    public function showReels(User $user)
    {

        auth()->user()->attachFollowStatus($user);

        $reels = $user->posts()->where('type', 'reel')->withLikersCount()->with('media')->paginate(12);

        return Inertia::render('IgProfile/ProfileReels', ['user' => fn () => $user, 'reels' => $reels]);
    }

    public function showSaved(User $user)
    {

        auth()->user()->attachFollowStatus($user);

        $saved = $user->getFavoriteItems(Post::class)->with('media')->with('user')->paginate(12);

        return Inertia::render('IgProfile/ProfileSaved', ['user' => fn () => $user, 'saved' => fn () => $saved]);
    }
}
