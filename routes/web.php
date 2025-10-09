<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SettingController;
use App\Models\Transaction;
use App\Models\Module;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('learning')->group(function () {
    Route::get('/', [LearningController::class, 'index'])->name('learning.index'); // daftar modul
    Route::get('/{module}', [LearningController::class, 'show'])->name('learning.show'); // detail modul
})->middleware(['auth', 'verified']);

Route::post('/lessons/{lesson}/complete', [LessonController::class, 'complete']);

Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::get('/community/create', [CommunityController::class, 'create'])->name('community.create')->middleware('auth');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store')->middleware('auth');
Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');
Route::post('/community/{id}/comment', [CommunityController::class, 'storeComment'])->name('community.comment')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/logout', [ProfileController::class, 'logoutAllDevices'])->name('profile.logout');
    Route::delete('/account/delete', [ProfileController::class, 'destroy'])->name('account.delete');

});

// Route::get('/learning', [LearningController::class, 'index'])->name('learning.index')->middleware(['auth', 'verified']);

Route::get('/finance', [FinanceController::class, 'index'])->name('finance.index');
Route::post('/finance', [FinanceController::class, 'store'])->name('finance.store');
Route::delete('/finance/{transaction}', [FinanceController::class, 'destroy'])->name('finance.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/consultation', [ConsultationController::class, 'index'])->name('consultations.index');
    Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultations.store');
    Route::get('/consultation/detail/{id}', [ConsultationController::class, 'show'])->name('consultations.show');
});

Route::get('/hpp-calculator', function () {
    return view('hpp');
})->middleware(['auth', 'verified']);

// Route::get('/profile', function () {
//     return view('profile');
// })->middleware(['auth', 'verified']);

Route::get('/learning/detail', function () {
    return view('detail-learning');
})->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/setting', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/setting/language', [SettingController::class, 'updateLanguage'])->name('settings.language');
});

Route::get('/subscription', function () {
    return view('subscription');
})->middleware(['auth', 'verified']);

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index')->middleware(['auth', 'verified']);
Route::post('/recipes/{recipe}/buy', [RecipeController::class, 'buy'])->name('recipes.buy');

Route::get('/dashboard', function () {
    $userId = auth()->id();

    $financeIncome = Transaction::where('user_id', $userId)
        ->where('type', 'Income')
        ->sum('amount');

    $financeExpense = Transaction::where('user_id', $userId)
        ->where('type', 'Expense')
        ->sum('amount');

    $financeProfit = $financeIncome - $financeExpense;

    $modules = Module::with(['lessons.progress' => function ($query) use ($userId) {
        $query->where('user_id', $userId);
    }])->get();

    $learningTotalModules = $modules->count();

    $learningCompletedModules = $modules->filter(function ($module) {
        if ($module->lessons->isEmpty()) {
            return false;
        }

        return $module->lessons->every(function ($lesson) {
            $progress = $lesson->progress->first();
            return $progress && $progress->status === 'Completed';
        });
    })->count();

    $learningRemainingModules = max($learningTotalModules - $learningCompletedModules, 0);
    $learningProgressPercent = $learningTotalModules > 0
        ? min(100, round(($learningCompletedModules / $learningTotalModules) * 100))
        : 0;

    $recentTransactions = Transaction::where('user_id', $userId)
        ->orderBy('date', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('dashboard', compact(
        'financeIncome',
        'financeExpense',
        'financeProfit',
        'learningTotalModules',
        'learningCompletedModules',
        'learningRemainingModules',
        'learningProgressPercent',
        'recentTransactions'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
