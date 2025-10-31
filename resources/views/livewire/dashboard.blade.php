<div data-dashboard-id="{{ $this->id }}" class="p-5 m-5 bg-white rounded-xl shadow w-full">
    <h1 class="text-2xl font-bold">Hello {{ $user->name }}! These are your tasks</h1>

    <div drag-root class="flex flex-col md:flex-row gap-6 mt-5">
        <div class="flex-1 bg-gray-200 p-4 rounded-lg task-column" data-status="pending">
            <h2 class="text-xl font-semibold mb-4">Pending</h2>
            <div class="space-y-4">
                @foreach ($tasks['pending'] as $task)
                    <livewire:task-card wire:key="task-{{ $task->id }}-{{ $task->updated_at->timestamp }}" :taskId="$task->id" :title="$task->title"
                        :description="$task->description" />
                @endforeach
            </div>

            <div class="mt-4">
                @if ($creatingOnColumn === 'pending')
                    <livewire:create-task />
                @else
                    <button wire:click="showCreateTaskOnColumn('pending')"
                        class="bg-transparent rounded-lg px-3 py-2 hover:shadow hover:bg-gray-100 font-semibold hover:cursor-pointer">
                        <span class="text-xl mr-2">+</span> Add a task
                    </button>
                @endif
            </div>
        </div>

        <div class="flex-1 bg-gray-200 p-4 rounded-lg task-column" data-status="in_progress">
            <h2 class="text-xl font-semibold mb-4">In Progress</h2>
            <div class="space-y-4">
                @foreach ($tasks['in_progress'] as $task)
                    <livewire:task-card wire:key="task-{{ $task->id }}-{{ $task->updated_at->timestamp }}" :taskId="$task->id" :title="$task->title"
                        :description="$task->description" />
                @endforeach
            </div>

            <div class="mt-4">
                @if ($creatingOnColumn === 'in_progress')
                    <livewire:create-task />
                @else
                    <button wire:click="showCreateTaskOnColumn('in_progress')"
                        class="bg-transparent rounded-lg px-3 py-2 hover:shadow hover:bg-gray-100 font-semibold hover:cursor-pointer">
                        <span class="text-xl mr-2">+</span> Add a task
                    </button>
                @endif
            </div>
        </div>

        <div class="flex-1 bg-gray-200 p-4 rounded-lg task-column" data-status="completed">
            <h2 class="text-xl font-semibold mb-4">Completed</h2>
            <div class="space-y-4">
                @foreach ($tasks['completed'] as $task)
                    <livewire:task-card wire:key="task-{{ $task->id }}-{{ $task->updated_at->timestamp }}" :taskId="$task->id" :title="$task->title"
                        :description="$task->description" />
                @endforeach
            </div>

            <div class="mt-4">
                @if ($creatingOnColumn === 'completed')
                    <livewire:create-task />
                @else
                    <button wire:click="showCreateTaskOnColumn('completed')"
                        class="bg-transparent rounded-lg px-3 py-2 hover:shadow hover:bg-gray-100 font-semibold hover:cursor-pointer">
                        <span class="text-xl mr-2">+</span> Add a task
                    </button>
                @endif
            </div>
        </div>
    </div>

    @if ($selectedTaskId !== null)
        <livewire:task-view :taskId="$selectedTaskId" />
    @endif
</div>

@push('scripts')
    <script>
        function dragAndDrop() {
            const columns = document.querySelectorAll(".task-column");
            columns.forEach(column => {
                // First remove the old listeners
                column.removeEventListener("dragover", dragover);
                column.removeEventListener("drop", drop);

                // Then, add the new ones
                column.addEventListener("dragover", e => e.preventDefault());
                column.addEventListener("drop", drop);
            });

            const tasks = document.querySelectorAll(".task");
            tasks.forEach(task => {
                task.removeEventListener("dragstart", dragstart);
                task.addEventListener("dragstart", dragstart);
            });
        }

        function dragover(e) {
            e.preventDefault();
        }

        function drop(e) {
            e.preventDefault();

            const taskId = e.dataTransfer.getData('text/plain');
            const newStatus = e.currentTarget.dataset.status;

            // Call the livewire component
            const dashboard = Livewire.find(document.querySelector('[data-dashboard-id]').dataset
                .dashboardId);
            dashboard.call('updateTaskStatus', taskId, newStatus);
        }

        function dragstart(e) {
            e.dataTransfer.setData("text/plain", e.target.dataset.id);
        }

        // Run on each update of the component, so the listener has the new task
        document.addEventListener("livewire:load", dragAndDrop);
        document.addEventListener("livewire:update", dragAndDrop);

        setTimeout( function() {
            console.log('HEY');
            Livewire.emitTo('notification', 'notify', 'HOLA LOGGED IN');
        }, 2000);
    </script>
@endpush
