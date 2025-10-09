<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
        'content',
        'likes',
    ];

    /**
     * Relasi: Komentar dimiliki oleh Thread.
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Relasi: Komentar dimiliki oleh User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
