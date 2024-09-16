@php
    $markdown = File::get(resource_path('roadmap.md'));
    $totalTasks = substr_count($markdown, '- [ ]') + substr_count($markdown, '- [x]');
    $completedTasks = substr_count($markdown, '- [x]');
    $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
@endphp
<x-guest-layout>
    <div class="container mx-auto my-8 px-4">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Transparent Change Task Board</h2>

        <div class="mb-6">
            <div class="flex justify-between mb-2">
                <span class="text-sm font-medium text-gray-700">Progress</span>
                <span class="text-sm font-medium text-gray-700">{{ round($progress) }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
            <div class="text-sm text-gray-500 mt-2">{{ $completedTasks }} of {{ $totalTasks }} tasks completed</div>
        </div>

        <div class="markdown-content prose prose-sm sm:prose lg:prose-lg xl:prose-xl max-w-none">
            {!! Str::markdown($markdown) !!}
        </div>
    </div>
</x-guest-layout>
