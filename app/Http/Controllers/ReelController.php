<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class ReelController extends Controller
{
    public function index()
    {

        $reels = Post::where('type', 'reel')
            ->withLikersCount()
            ->inRandomOrder()
            ->with('media', 'user')
            ->paginate(6);

        return Inertia::render('Reels', ['reels' => $reels]);
    }
}
