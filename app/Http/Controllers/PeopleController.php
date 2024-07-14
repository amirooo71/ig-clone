<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PeopleController extends Controller
{
    public function indexFollowers()
    {
        $authUser = Auth::user();
        $followers = $authUser->followers()->withCount('followers')->paginate(12);
        $authUser->attachFollowStatus($followers);

        return Inertia::render('People/Followers', [
            'followers' => fn () => $followers,
        ]);
    }

    public function indexFollowings()
    {
        $authUser = Auth::user();
        $followings = $authUser->followings()->with(['followable' => function ($query) {
            $query->withCount('followers');
        }])->paginate(20);

        return Inertia::render('People/Followings', [
            'followings' => fn () => $followings,
        ]);
    }

    public function indexSuggestions()
    {
        return Inertia::render('People/Suggestions', [
            'suggestions' => fn () => $this->getSuggestionUsers(),
        ]);
    }

    public function toggleFollow(User $user)
    {
        auth()->user()->toggleFollow($user);

        if (auth()->user()->isFollowing($user)) {
            $user->notify(new NewFollowerNotification(auth()->user()));
        }

        return back();
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
            ->withCount('followers')
            ->inRandomOrder()
            ->paginate(12);

        $authUser->attachFollowStatus($usersNotFollowed);

        return $usersNotFollowed;

    }
}
