<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use Favoriteable;
    use HasFactory;
    use Likeable;

    protected $guarded = [];

    protected $casts = [
        'allow_commenting' => 'boolean',
        'view_likes_count' => 'boolean',
    ];

    protected $appends = ['comments_count'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function media(): HasOne
    {
        return $this->hasOne(Media::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getCommentsCountAttribute(): int
    {
        return $this->comments()->count();
    }

    public function scopeWithUserAndMedia($query)
    {
        return $query->with('user', 'media');
    }

    public function scopeWithLikersCount($query)
    {
        return $query->withCount('likers');
    }

    public function scopePostFromFollowings($query)
    {
        $followedUserIds = auth()->user()->followings()->pluck('followable_id');

        return $query->whereIn('user_id', $followedUserIds)->orderBy('created_at', 'desc');
    }

    public function scopeWithUserLatestComment($query, $userId)
    {
        return $query->with(['comments' => function ($query) use ($userId) {
            $query->where('user_id', $userId)->latest()->limit(1);
        }]);
    }
}
