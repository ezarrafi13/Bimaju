<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua modul beserta lesson dan progress user
        $modules = Module::with(['lessons.progress' => function ($q) use ($user) {
            $q->where('user_id', $user->id);
        }])->get();

        // Hitung progress user (module completed / total modules)
        $completedModules = $modules->filter(function ($module) {
            // modul dianggap Complete kalau semua lesson-nya status "completed"
            return $module->lessons->every(function ($lesson) {
                return $lesson->progress->first()?->status === 'Completed';
            });
        })->count();

        $totalModules = $modules->count();

        $progressPercent = $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;

        return view('learning', compact('modules', 'completedModules', 'totalModules', 'progressPercent'));
    }

    public function show($moduleId)
{
    $module = Module::with([
        'lessons.contents',
        'lessons.resources',
        'lessons.takeaways',
        'lessons.quiz.questions', // ✅ eager load quiz & questions
        'lessons.progress' => function ($q) {
            $q->where('user_id', auth()->id());
        }
    ])->findOrFail($moduleId);

    // transform supaya mudah dipakai di Alpine (camelCase keys)
    $lessons = $module->lessons->map(function ($lesson) {
        return [
            'id' => $lesson->id,
            'title' => $lesson->title,
            'duration' => $lesson->duration,
            'estimatedTime' => $lesson->estimated_time,
            'status' => optional($lesson->progress->first())->status ?? 'Not Started',
            'resources' => $lesson->resources->map(fn($r) => [
                'id' => $r->id,
                'title' => $r->title,
                'type' => $r->type,
                'resource_link' => $r->resource_link,
            ])->values()->toArray(),
            'keyTakeaways' => $lesson->takeaways->pluck('takeaway')->toArray(),
            'contents' => $lesson->contents->map(fn($c) => [
                'id' => $c->id,
                'type' => $c->type,
                'content_link' => $c->content_link,
                'description' => $c->description,
            ])->values()->toArray(),

            // ✅ Tambahin quiz
            'quiz' => $lesson->quiz ? [
                'id' => $lesson->quiz->id,
                'title' => $lesson->quiz->title,
                'description' => $lesson->quiz->description,
                'timeLimit' => $lesson->quiz->time_limit,
                'questions' => $lesson->quiz->questions->map(fn($q) => [
                    'id' => $q->id,
                    'question' => $q->question,
                    'option_a' => $q->option_a,
                    'option_b' => $q->option_b,
                    'option_c' => $q->option_c,
                    'option_d' => $q->option_d,
                    'correct_answer' => $q->correct_answer, // bisa dihilangin kalau ga mau bocor ke client
                ])->toArray(),
            ] : null,
        ];
    })->values();

    $completedLessons = collect($lessons)->where('status', 'Complete')->count();
    $totalLessons = $lessons->count();
    $progress = $totalLessons ? round(($completedLessons / $totalLessons) * 100) : 0;

    return view('detail-learning', [
        'module' => $module,
        'lessons' => $lessons,
        'completedLessons' => $completedLessons,
        'progress' => $progress,
        'moduleData' => [
            'title' => $module->title,
            'totalLessons' => $totalLessons,
            'completedLessons' => $completedLessons,
        ],
    ]);
}


}
