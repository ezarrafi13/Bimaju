<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relasi: Tag bisa digunakan di banyak Thread.
     */
    public function threads()
    {
        return $this->belongsToMany(Thread::class, 'thread_tag');
    }
}
