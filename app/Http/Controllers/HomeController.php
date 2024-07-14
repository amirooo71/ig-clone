<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $posts = Post::PostFromFollowings()
            ->withUserAndMedia()
            ->withLikersCount()
            ->withUserLatestComment($user->id)
            ->latest()
            ->paginate(10);
        $user->attachLikeStatus($posts);
        $user->attachFavoriteStatus($posts);

        return Inertia::render('Home', [
            'posts' => fn () => $posts,
            'suggestions' => $this->getSuggestionUsers(),
        ]);
    }

    private function getSuggestionUsers()
    {

        $authUser = auth()->user();
        $usersNotFollowed = User::whereNotIn('id', function ($query) use ($authUser) {
            $query->select('followable_id')
                ->from('followables')
                ->where('followable_type', $authUser->getMorphClass())
                ->where('user_id', $authUser->id);
        })
            ->where('id', '!=', $authUser->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return $usersNotFollowed;

    }
}
