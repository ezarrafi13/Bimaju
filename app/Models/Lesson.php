<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'order_number',
        'duration',
        'estimated_time',
        'status',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function contents()
    {
        return $this->hasMany(LessonContent::class);
    }

    public function takeaways()
    {
        return $this->hasMany(LessonTakeaway::class);
    }

    public function resources()
    {
        return $this->hasMany(LessonResource::class);
    }

    public function progress()
    {
        return $this->hasMany(UserLessonProgress::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

}
