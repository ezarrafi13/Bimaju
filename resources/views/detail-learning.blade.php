@php
$currentLesson = $lessons->first(); // default lesson pertama
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $module->title }} - {{ __('Learning') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        @include('components.sidebar')
        <div class="flex-grow flex flex-col pl-64">
            {{-- Header atas --}}
            <div class="border-b border-gray-200 bg-white p-6 flex justify-between items-center fixed z-10 w-full pr-72">
                <div class="flex flex-col">
                    <h1 class="font-bold text-2xl">{{ __('Welcome back, :name!', ['name' => auth()->user()->name ?? __('User')]) }}</h1>
                    <p class="text-gray-500">{{ __("Ready to grow your F&B business today?") }}</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            {{-- Alpine State --}}
            <div
                x-data="{
                    lessons: @js($lessons),
                    currentLesson: @js($currentLesson),
                    completedCount: @js($completedLessons),
                    progress: @js($progress),
                    showQuiz: false,
                    setLesson(lesson) {
                        this.currentLesson = lesson;
                    },

                    markComplete() {
                        fetch(`/lessons/${this.currentLesson.id}/complete`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            this.currentLesson.status = data.status ?? 'Completed';
                            this.currentLesson.progress_percent = data.progress_percent ?? 100;
                            const idx = this.lessons.findIndex(l => l.id === this.currentLesson.id);
                            if (idx !== -1) {
                                this.lessons[idx].status = this.currentLesson.status;
                                this.lessons[idx].progress_percent = this.currentLesson.progress_percent;
                            }

                            this.completedCount = this.lessons.filter(l => l.status === 'Completed').length;
                            if (this.lessons.length > 0) {
                                this.progress = Math.round((this.completedCount / this.lessons.length) * 100);
                                if (this.completedCount === this.lessons.length) {
                                    this.progress = 100;
                                }
                            } else {
                                this.progress = 0;
                            }
                        })
                        .catch(err => console.error(err));
                    },

                    nextLesson() {
                        const idx = this.lessons.findIndex(l => l.id === this.currentLesson.id);
                        if (idx < this.lessons.length - 1) {
                            this.currentLesson = this.lessons[idx + 1];
                        }
                    },

                    prevLesson() {
                        const idx = this.lessons.findIndex(l => l.id === this.currentLesson.id);
                        if (idx > 0) {
                            this.currentLesson = this.lessons[idx - 1];
                        }
                    },
                    quizScore: 0,
                    submitQuiz() {
                        let score = 0;
                        this.currentLesson.quiz.questions.forEach(q => {
                            if (q.userAnswer === q.correct_answer) {
                                score++;
                            }
                        });
                        this.quizScore = score;

                        // Kirim ke server untuk simpan hasil
                        fetch(`/quiz/${this.currentLesson.quiz.id}/submit`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            body: JSON.stringify({
                                answers: this.currentLesson.quiz.questions.map(q => ({
                                    question_id: q.id,
                                    answer: q.userAnswer
                                }))
                            })
                        });
                    }

                }"

                class="pt-28"
            >
                {{-- Sticky Header --}}
                <div class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b">
                    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('learning.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-800">
                                ← Back to Learning
                            </a>
                            <div>
                                <h1 class="text-xl font-semibold text-gray-900">{{ $module->title }}</h1>
                                <p class="text-sm text-gray-500">
                                    {{ __('Lesson') }} <span x-text="currentLesson.id"></span> {{ __('of') }} <span x-text="lessons.length"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-700">
                                <span x-text="completedCount"></span>/<span x-text="lessons.length"></span> {{ __('completed') }}
                            </div>
                            <div class="w-32 bg-gray-200 rounded-full h-2 mt-1">
                                <div class="bg-cyan-600 h-2 rounded-full" :style="`width: ${progress}%`"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Body --}}
                <div class="container mx-auto px-6 py-6 grid grid-cols-12 gap-6">
                    {{-- Sidebar Lessons --}}
                    <div class="col-span-3 bg-white shadow rounded-lg p-4 space-y-2">
                        <h2 class="font-semibold mb-3">{{ __('Lessons') }}</h2>
                        <template x-for="(lesson, index) in lessons" :key="lesson.id">
                            <button
                                @click="setLesson(lesson)"
                                class="w-full text-left p-2 rounded"
                                :class="lesson.id === currentLesson.id ? 'bg-cyan-100 text-cyan-700 font-semibold' : 'hover:bg-gray-100'"
                            >
                                <!-- pakai index + 1 sebagai nomor urut -->
                                <span x-text="(index + 1) + '. ' + lesson.title"></span>
                                <span class="text-xs text-gray-500 block" x-text="lesson.duration + ' • ' + lesson.status"></span>
                            </button>
                        </template>
                    </div>
                    {{-- Main Content --}}
                    <div class="col-span-6 space-y-6">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-3" x-text="currentLesson.title"></h2>
                            <template x-if="currentLesson.contents && currentLesson.contents.length && currentLesson.contents[0].type === 'video'">
                                <iframe :src="currentLesson.contents[0].content_link"
                                        width="560" height="315"
                                        class="w-full mb-6"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                            </template>

                            <div class="w-full mb-6">
                                <p class="text-gray-700 leading-relaxed" x-text="currentLesson.contents[0].description"></p>
                            </div>
                        </div>

                        <div class="bg-white shadow rounded-lg p-6" x-show="currentLesson.keyTakeaways">
                            <h3 class="font-semibold mb-3">{{ __('Key Takeaways') }}</h3>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <template x-for="takeaway in currentLesson.keyTakeaways" :key="takeaway">
                                    <li x-text="takeaway"></li>
                                </template>
                            </ul>
                        </div>

                        {{-- Navigation --}}
                        {{-- Navigation --}}
                        <div class="flex justify-between items-center">
                            <button
                                class="px-4 py-2 border rounded hover:bg-gray-100 disabled:opacity-50"
                                @click="prevLesson"
                                :disabled="currentLesson.id === 1"
                            >
                                    {{ __("Previous Lesson") }}
                            </button>

                            <div class="flex gap-3">
                                <button
                                    class="px-6 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-700"
                                    @click="markComplete"
                                >
                                    {{ __("Mark as Complete") }}
                                </button>
                                <a
                                    x-show="currentLesson.status === 'Completed'"
                                    x-cloak
                                    href="{{ route('learning.index') }}"
                                    class="px-6 py-2 border border-cyan-500 text-cyan-600 rounded hover:bg-cyan-50 flex items-center justify-center"
                                >
                                    {{ __("Go Back") }}
                                </a>

                                <button
                                    class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                                    @click="showQuiz = !showQuiz"
                                    x-show="currentLesson.quiz"
                                >
                                    {{ __("Take Quiz") }}
                                </button>
                            </div>

                            <button
                                class="px-4 py-2 border rounded hover:bg-gray-100 disabled:opacity-50"
                                @click="nextLesson"
                                :disabled="currentLesson.id === lessons.length"
                            >
                                {{ __('Next Lesson') }}
                            </button>
                        </div>

                        <!-- Quiz Section -->
                        <div class="mt-6" x-show="showQuiz && currentLesson.quiz" x-cloak>
                            <div class="bg-white rounded-lg shadow p-6 space-y-6">
                                <h2 class="text-xl font-bold">{{ __('Knowledge Check') }}</h2>

                                <!-- Pertanyaan -->
                                <template x-for="(q, idx) in currentLesson.quiz.questions" :key="q.id">
                                    <div class="space-y-2">
                                        <h3 class="font-semibold">Question <span x-text="idx+1"></span></h3>
                                        <p class="text-gray-700" x-text="q.question"></p>
                                        <div class="space-y-2">
                                            <template x-for="opt in ['A','B','C','D']" :key="opt">
                                                <label class="flex items-center gap-2">
                                                    <input type="radio"
                                                           :name="'question_'+q.id"
                                                           :value="opt"
                                                           x-model="q.userAnswer">
                                                    <span x-text="q['option_'+opt.toLowerCase()]"></span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                </template>

                                <!-- Score & Submit -->
                                <div class="flex justify-between items-center pt-4 border-t">
                                    <div>{{ __('Score') }}: <span x-text="quizScore"></span>/<span x-text="currentLesson.quiz.questions.length"></span></div>
                                    <button
                                        class="px-6 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-700"
                                        @click="submitQuiz"
                                    >
                                        {{ __('Submit Answer') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Right Sidebar --}}
                    <div class="col-span-3 space-y-6">
                        <div class="bg-white shadow rounded-lg p-4" x-show="currentLesson.resources">
                            <h3 class="font-semibold mb-3">Resources</h3>
                            <ul class="space-y-2">
                                <template x-for="res in currentLesson.resources" :key="res.id">
                                    <li class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                                        <span x-text="res.title"></span>
                                        <span class="text-xs text-gray-500" x-text="res.type"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- Notes -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                                    <span class="material-icons text-gray-500 text-lg">note</span>
                                    {{ __('Notes') }}
                                </h3>
                                <div class="flex gap-2 text-gray-500">
                                    <button><i class="material-icons text-sm">content_copy</i></button>
                                    <button><i class="material-icons text-sm">file_download</i></button>
                                    <button><i class="material-icons text-sm">print</i></button>
                                </div>
                            </div>
                            <textarea class="w-full border rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-cyan-400 text-sm"
                                      rows="4"></textarea>
                        </div>

                        <!-- Action Checklist -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-semibold text-gray-800">{{ __('Action Checklist') }}</h3>
                                <button class="text-cyan-500 text-xl leading-none">+</button>
                            </div>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="flex items-start gap-2">
                                    <input type="checkbox" checked class="mt-1 text-cyan-500">
                                    <span>{{ __('List all your fixed monthly expenses') }} <br><span class="text-gray-500 text-xs">({{ __('rent, utilities, salaries') }})</span></span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <input type="checkbox" checked class="mt-1 text-cyan-500">
                                    <span>{{ __('Calculate average variable costs per month') }} <br><span class="text-gray-500 text-xs">({{ __('ingredients, supplies') }})</span></span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <input type="checkbox" checked class="mt-1 text-cyan-500">
                                    <span>{{ __('Review last 3 months of sales to forecast revenue') }}</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <input type="checkbox" checked class="mt-1 text-cyan-500">
                                    <span>{{ __('Set aside 10-15% for emergency expenses') }}</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <input type="checkbox" class="mt-1 text-cyan-500">
                                    <span>{{ __('Create a simple tracking system (spreadsheet or app)') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
