<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTakeaway extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'takeaway',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
