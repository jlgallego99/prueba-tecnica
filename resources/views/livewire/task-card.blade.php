<div wire:click='openTask' drag-item draggable="true" class="task bg-white p-4 rounded-lg shadow hover:shadow-md cursor-pointer" data-id="{{ $taskId }}">
    <h3 class="text-xl font-semibold mb-2">{{ $title }}</h3>
    <p class="text-gray-700 text-md">{{ $description }}</p>
</div>
