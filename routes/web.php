<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/test', function () {

    $user = \App\Models\User::find(51);

    return $user;
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting');

    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
    Route::get('/reels', [ReelController::class, 'index'])->name('reels');

    Route::get('/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::post('/post/{post}/like-toggle', [PostController::class, 'toggleLike'])->name('post.like-toggle');
    Route::post('/post/{post}/like-favorite', [PostController::class, 'toggleFavorite'])->name('post.like-favorite');

    Route::get('/post/{post}/comments', [CommentController::class, 'show'])->name('comment.show');
    Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/people/followers', [PeopleController::class, 'indexFollowers'])->name('people.followers');
    Route::get('/people/followings', [PeopleController::class, 'indexFollowings'])->name('people.followings');
    Route::get('/people/suggestions', [PeopleController::class, 'indexSuggestions'])->name('people.suggestions');
    Route::post('/people/{user}/toggle-follow', [PeopleController::class, 'toggleFollow'])->name('people.toggle-follow');

    Route::get('/profile/{user}/posts', [ProfileController::class, 'showPosts'])->name('profile.posts.show');
    Route::get('/profile/{user}/reels', [ProfileController::class, 'showReels'])->name('profile.reels.show');
    Route::get('/profile/{user}/saved', [ProfileController::class, 'showSaved'])->name('profile.saved.show');

    Route::get('/notification/{id}', [NotificationController::class, 'markAsRead'])->name('notification.mark-as-read');

    Route::get('/search', SearchController::class)->name('search');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');
    Route::get('/conversation/{user}/create', [ConversationController::class, 'create'])->name('conversation.create');
    Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');

    Route::post('/message/{conversation}/send', [MessageController::class, 'store'])->name('message.store');

});
