<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['read_at'];

    protected $appends = [
        'profile_photo_url',
    ];

    public function conversation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function isRead(): bool
    {
        return $this->read_at !== null;
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->sender_id === auth()->id()) {
            return User::firstWhere('id', $this->receiver_id)->profile_photo_url;
        } else {
            return User::firstWhere('id', $this->sender_id)->profile_photo_url;
        }
    }
}
