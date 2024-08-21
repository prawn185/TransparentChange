<div class="container my-4">
    <h2 class="text-2xl font-bold mb-4">Transparent Change Task Board</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach ($statuses as $status)
            <div class="bg-gray-100 p-4 rounded">
                <h3 class="font-bold mb-2">{{ $status }}</h3>
                @if(isset($tasks[$status]))
                    @foreach ($tasks[$status] as $task)
                        <div class="bg-white p-2 mb-2 rounded shadow">
                            <p class="font-semibold">{{ $task['title'] }}</p>
                            <p class="text-sm text-gray-600">{{ $task['description'] }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
