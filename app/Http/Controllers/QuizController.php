<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function submit(Request $request, Quiz $quiz)
    {
        $answers = $request->input('answers', []);
        $score = 0;

        foreach ($answers as $ans) {
            $question = QuizQuestion::find($ans['question_id']);
            if ($question && $question->correct_answer === $ans['answer']) {
                $score++;
            }
        }

        // TODO: bisa disimpan ke tabel user_quiz_results
        // UserQuizResult::create([...])

        return response()->json([
            'message' => 'Quiz submitted successfully',
            'score' => $score,
            'total' => $quiz->questions()->count(),
        ]);
    }
}
