<div class="p-5 m-5 bg-white rounded-xl shadow w-3/4">
    <h1 class="text-2xl font-bold">Hello {{ $user->name }}! These are your tasks</h1>

    <div class="flex gap-6 mt-5">
        <div class="flex-1 bg-gray-200 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Pending</h2>
            <div class="space-y-4">
            </div>
        </div>

        <div class="flex-1 bg-gray-200 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">In Progress</h2>
            <div class="space-y-4">
            </div>
        </div>

        <div class="flex-1 bg-gray-200 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Completed</h2>
            <div class="space-y-4">
            </div>
        </div>
    </div>
</div>
