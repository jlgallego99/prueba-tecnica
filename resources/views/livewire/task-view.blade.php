<form wire:submit.prevent="submit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative w-full max-w-2xl p-4">
        <div class="bg-gray-200 rounded-lg shadow">
            <div class="flex items-center justify-between px-4 py-2 bg-primary rounded-t-lg">
                <h2 class="text-white font-medium text-sm uppercase tracking-wide">
                    TASK {{ $status }}
                </h2>
                <button type="button" class="text-xl text-gray-400 hover:text-secondary cursor-pointer"
                    wire:click="close">
                    ✕
                </button>
            </div>

            <div class="flex items-center justify-between p-4">
                <input type="text" wire:model='title'
                    class="text-xl w-full bg-white rounded-lg px-3 py-2 mr-5 hover:shadow hover:bg-gray-100" />
            </div>

            <div class="p-4 space-y-4">
                <textarea wire:model='description'
                    class="w-full bg-white rounded-lg px-3 py-2 mr-5 hover:shadow hover:bg-gray-100 h-[10rem]"></textarea>
            </div>

            <div class="flex justify-between p-4">
                <button wire:click='deleteTask' class="bg-transparent text-red-500 rounded-md mt-2 px-3 py-1 hover:cursor-pointer hover:underline">Delete</button>
                <button type="submit" class="bg-primary text-white rounded-md mt-2 px-3 py-1 hover:cursor-pointer hover:bg-[#b7a5fc]">Update</button>
            </div>
        </div>
    </div>
</form>
