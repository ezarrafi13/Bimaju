<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        @include('components.sidebar')
        <div class="space-y-6 w-full">
            <div class="mb-2 border-b border-gray-200 p-6 flex justify-between items-center">
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold text-3xl">Welcome back, Sari!</h1>
                    <p>Ready to grow your F&B business today?</p>
                </div>
                <div class="profile-wrapper">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/flower.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            @php
    $moduleData = [
    "id" => 1,
    "title" => "Basic Finance Management",
    "totalLessons" => 12,
    "completedLessons" => 4,
    "lessons" => [
        [
            "id" => 1,
            "title" => "Introduction to F&B Finance",
            "duration" => "8 min",
            "estimatedTime" => "5-10 min",
            "content" => [
                "type" => "video",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Get an overview of financial management in the Food & Beverage industry. Learn why finance is crucial for sustainable business operations."
            ],
            "keyTakeaways" => [
                "Understand the importance of finance in F&B",
                "Identify key financial terms",
                "Recognize how finance impacts business decisions"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Finance Basics PDF","type"=>"PDF"],
                ["id"=>2,"title"=>"Intro Video Notes","type"=>"Doc"]
            ],
            "status" => "Completed"
        ],
        [
            "id" => 2,
            "title" => "Understanding Cash Flow",
            "duration" => "12 min",
            "estimatedTime" => "10-15 min",
            "content" => [
                "type" => "text",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Learn how cash flows in and out of your F&B business and why it is more important than just profit numbers."
            ],
            "keyTakeaways" => [
                "Differentiate between cash inflows and outflows",
                "Understand operating vs investing cash flows",
                "Learn to maintain positive cash flow"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Cash Flow Template","type"=>"Excel"]
            ],
            "status" => "Completed"
        ],
        [
            "id" => 3,
            "title" => "Basic Accounting Principles",
            "duration" => "15 min",
            "estimatedTime" => "15-20 min",
            "content" => [
                "type" => "video",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Learn the fundamental accounting principles every F&B entrepreneur should know to keep financial records accurate."
            ],
            "keyTakeaways" => [
                "Understand assets, liabilities, and equity",
                "Learn about debits and credits",
                "Recognize the importance of balance sheets"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Accounting Basics Sheet","type"=>"PDF"]
            ],
            "status" => "Completed",
            "updated" => true
        ],
        [
            "id" => 4,
            "title" => "Revenue vs Profit",
            "duration" => "10 min",
            "estimatedTime" => "10-15 min",
            "content" => [
                "type" => "text",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Understand the difference between revenue and profit, and why both metrics matter in evaluating business success."
            ],
            "keyTakeaways" => [
                "Define revenue and profit",
                "Differentiate gross vs net profit",
                "Identify common profit margin mistakes"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Revenue vs Profit Guide","type"=>"Doc"]
            ],
            "status" => "Completed"
        ],
        [
            "id" => 5,
            "title" => "Creating Your First Budget",
            "duration" => "18 min",
            "estimatedTime" => "15-20 min",
            "content" => [
                "type" => "video",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Learn how to create an effective budget for your F&B business. We'll cover revenue forecasting, expense categorization, and setting realistic financial targets that will help you make informed business decisions."
            ],
            "keyTakeaways" => [
                "Understand the difference between fixed and variable costs in your F&B business",
                "Learn to forecast monthly revenue based on historical data and market trends",
                "Create expense categories that match your business operations",
                "Set realistic profit margins and growth targets",
                "Build contingency planning into your budget for unexpected expenses"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Budget Template for F&B","type"=>"Excel"],
                ["id"=>2,"title"=>"Cost Calculation Worksheet","type"=>"PDF"],
                ["id"=>3,"title"=>"Monthly Tracking Sheet","type"=>"Google Sheets"],
            ],
            "status" => "In Progress"
        ],
        [
            "id" => 6,
            "title" => "Tracking Daily Expenses",
            "duration" => "7 min",
            "estimatedTime" => "5-10 min",
            "content" => [
                "type" => "text",
                "thumbnail" => "/api/placeholder/640/360",
                "description" => "Learn simple methods for tracking and managing your daily expenses to maintain healthy cash flow."
            ],
            "keyTakeaways" => [
                "Record daily business expenses consistently",
                "Categorize expenses properly",
                "Identify patterns of overspending"
            ],
            "resources" => [
                ["id"=>1,"title"=>"Daily Expense Tracker","type"=>"Excel"]
            ],
            "status" => "Not Started"
        ]
    ]
];


    $currentLesson = [
        "id" => 5,
        "title" => "Creating Your First Budget",
        "duration" => "18 min",
        "estimatedTime" => "15-20 min",
        "content" => [
            "type" => "video",
            "thumbnail" => "/api/placeholder/640/360",
            "description" => "Learn how to create an effective budget for your F&B business. We'll cover revenue forecasting, expense categorization, and setting realistic financial targets that will help you make informed business decisions."
        ],
        "keyTakeaways" => [
            "Understand the difference between fixed and variable costs in your F&B business",
            "Learn to forecast monthly revenue based on historical data and market trends",
            "Create expense categories that match your business operations",
            "Set realistic profit margins and growth targets",
            "Build contingency planning into your budget for unexpected expenses"
        ],
        "resources" => [
            ["id"=>1,"title"=>"Budget Template for F&B","type"=>"Excel"],
            ["id"=>2,"title"=>"Cost Calculation Worksheet","type"=>"PDF"],
            ["id"=>3,"title"=>"Monthly Tracking Sheet","type"=>"Google Sheets"],
        ]
    ];

    $progress = ($moduleData["completedLessons"] / $moduleData["totalLessons"]) * 100;
@endphp

<div
    class="min-h-screen bg-gray-50"
    x-data="{
        lessons: @js($moduleData['lessons']),
        currentLesson: @js($currentLesson),
        setLesson(lesson) { this.currentLesson = lesson }
    }"
>
    {{-- Header --}}
    <div class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="{{ url('learning') }}" class="flex items-center gap-2 text-gray-500 hover:text-gray-800">
                    ← Back to Learning
                </a>
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">{{ $moduleData['title'] }}</h1>
                    <p class="text-sm text-gray-500">
                        Lesson <span x-text="currentLesson.id"></span> of {{ $moduleData['totalLessons'] }}
                    </p>
                </div>
            </div>
            <div>
                <div class="text-sm font-medium text-gray-700">
                    {{ $moduleData['completedLessons'] }}/{{ $moduleData['totalLessons'] }} completed
                </div>
                <div class="w-32 bg-gray-200 rounded-full h-2 mt-1">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Body --}}
    <div class="container mx-auto px-6 py-6 grid grid-cols-12 gap-6">
        {{-- Sidebar Lessons --}}
        <div class="col-span-3 bg-white shadow rounded-lg p-4 space-y-2">
            <h2 class="font-semibold mb-3">Lessons</h2>
            <template x-for="lesson in lessons" :key="lesson.id">
                <button
                    @click="setLesson(lesson)"
                    class="w-full text-left p-2 rounded"
                    :class="lesson.id === currentLesson.id ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-100'"
                >
                    <span x-text="lesson.id + '. ' + lesson.title"></span>
                    <span class="text-xs text-gray-500 block" x-text="lesson.duration + ' • ' + lesson.status"></span>
                </button>
            </template>
        </div>

        {{-- Main Content --}}
        <div class="col-span-6 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-bold mb-3" x-text="currentLesson.title"></h2>
                <template x-if="currentLesson.content?.thumbnail">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ouvbeb2wSGA?si=0zqHBaIHfdNt9i_h" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="w-full"></iframe>
                </template>
                <p class="text-gray-700 leading-relaxed" x-text="currentLesson.content?.description"></p>
            </div>

            <div class="bg-white shadow rounded-lg p-6" x-show="currentLesson.keyTakeaways">
                <h3 class="font-semibold mb-3">Key Takeaways</h3>
                <ul class="list-disc pl-5 space-y-1 text-gray-700">
                    <template x-for="takeaway in currentLesson.keyTakeaways" :key="takeaway">
                        <li x-text="takeaway"></li>
                    </template>
                </ul>
            </div>

            {{-- Navigation --}}
            <div class="flex justify-between">
                <button class="px-4 py-2 border rounded hover:bg-gray-100">← Previous Lesson</button>
                <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Mark as Complete</button>
                <button class="px-4 py-2 border rounded hover:bg-gray-100">Next Lesson →</button>
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
                Notes
            </h3>
            <div class="flex gap-2 text-gray-500">
                <button><i class="material-icons text-sm">content_copy</i></button>
                <button><i class="material-icons text-sm">file_download</i></button>
                <button><i class="material-icons text-sm">print</i></button>
            </div>
        </div>
        <textarea class="w-full border rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm"
                  rows="4"></textarea>
    </div>

    <!-- Action Checklist -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-3">
            <h3 class="font-semibold text-gray-800">Action Checklist</h3>
            <button class="text-blue-500 text-xl leading-none">+</button>
        </div>
        <ul class="space-y-2 text-sm text-gray-700">
            <li class="flex items-start gap-2">
                <input type="checkbox" checked class="mt-1 text-blue-500">
                <span>List all your fixed monthly expenses <br><span class="text-gray-500 text-xs">(rent, utilities, salaries)</span></span>
            </li>
            <li class="flex items-start gap-2">
                <input type="checkbox" checked class="mt-1 text-blue-500">
                <span>Calculate average variable costs per month <br><span class="text-gray-500 text-xs">(ingredients, supplies)</span></span>
            </li>
            <li class="flex items-start gap-2">
                <input type="checkbox" checked class="mt-1 text-blue-500">
                <span>Review last 3 months of sales to forecast revenue</span>
            </li>
            <li class="flex items-start gap-2">
                <input type="checkbox" checked class="mt-1 text-blue-500">
                <span>Set aside 10-15% for emergency expenses</span>
            </li>
            <li class="flex items-start gap-2">
                <input type="checkbox" class="mt-1 text-blue-500">
                <span>Create a simple tracking system (spreadsheet or app)</span>
            </li>
        </ul>
    </div>

    <!-- Related Resources -->
    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="font-semibold text-gray-800 mb-3">Related Resources</h3>
        <ul class="space-y-3 text-sm text-blue-600">
            <li class="flex justify-between items-center">
                <div>
                    <span class="font-medium">Budget Template for F&B</span>
                    <p class="text-xs text-gray-500">Excel</p>
                </div>
                <button><i class="material-icons text-gray-500 text-lg">download</i></button>
            </li>
            <li class="flex justify-between items-center">
                <div>
                    <span class="font-medium">Cost Calculation Worksheet</span>
                    <p class="text-xs text-gray-500">PDF</p>
                </div>
                <button><i class="material-icons text-gray-500 text-lg">download</i></button>
            </li>
            <li class="flex justify-between items-center">
                <div>
                    <span class="font-medium">Monthly Tracking Sheet</span>
                    <p class="text-xs text-gray-500">Google Sheets</p>
                </div>
                <button><i class="material-icons text-gray-500 text-lg">download</i></button>
            </li>
        </ul>
    </div>

    <!-- F&B Glossary -->
    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="font-semibold text-gray-800 mb-3">F&B Glossary</h3>
        <input type="text" placeholder="Search terms..."
               class="w-full border rounded-md px-3 py-2 text-sm mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <div class="space-y-4 text-sm">
            <div>
                <p class="font-medium text-gray-800">Food Cost Percentage</p>
                <p class="text-gray-600">The percentage of revenue spent on food ingredients and raw materials.</p>
                <span class="text-xs text-gray-500">Finance</span>
            </div>
            <div>
                <p class="font-medium text-gray-800">Cash Flow</p>
                <p class="text-gray-600">The movement of money in and out of your business over a specific period.</p>
                <span class="text-xs text-gray-500">Finance</span>
            </div>
            <div>
                <p class="font-medium text-gray-800">Gross Profit Margin</p>
            </div>
        </div>
    </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-4">
                <h3 class="font-semibold text-blue-700 mb-2">🏆 Achievement Goal</h3>
                <p class="text-sm text-gray-700">Complete 3 more lessons to earn the <strong>"Finance Starter"</strong> badge!</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                    <div class="bg-blue-600 h-2 rounded-full" style="width:33%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-2">1 of 3 lessons completed</p>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
</body>
</html>
