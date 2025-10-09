<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserLessonProgress;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function complete(Lesson $lesson)
    {
        $userId = auth()->id();

        $progress = UserLessonProgress::updateOrCreate(
            ['user_id' => $userId, 'lesson_id' => $lesson->id],
            [
                // gunakan string yang sama seperti enum migration kamu
                'status' => 'Completed',
                'progress_percent' => 100,
                'started_at' => now(),
                'completed_at' => now(),
            ]
        );

        return response()->json([
            'success' => true,
            'status' => $progress->status,
            'progress_percent' => $progress->progress_percent,
        ]);
    }

}
