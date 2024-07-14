<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class ExploreController extends Controller
{
    public function Index()
    {

        $posts = Post::where('type', 'post')
            ->with('media')
            ->inRandomOrder()
            ->paginate(30);

        return Inertia::render('Explore', ['posts' => fn () => $posts]);
    }
}
