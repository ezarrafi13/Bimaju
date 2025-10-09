<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'replies_count',
        'last_activity',
    ];

    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'last_activity' => 'datetime',
    ];

    /**
     * Relasi: Thread dimiliki oleh User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Thread memiliki banyak Comment.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relasi: Thread bisa memiliki banyak Tag.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'thread_tag');
    }
}
