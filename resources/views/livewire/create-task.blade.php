<form wire:submit.prevent="submit">
    <input autofocus type="text" wire:model="title" placeholder="Task title" class="w-full bg-white rounded-lg px-3 py-2 hover:shadow hover:bg-gray-100"/>
    <button type="submit" class="bg-primary text-white rounded-md mt-2 px-3 py-1 hover:cursor-pointer hover:bg-[#b7a5fc]">Create task</button>
</form>
