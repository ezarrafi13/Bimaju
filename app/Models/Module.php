<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'level',
        'description',
        'duration',
        'total_lessons',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
