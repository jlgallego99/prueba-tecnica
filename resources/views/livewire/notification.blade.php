@if ($notificationId)
    <div wire:key="notification-{{ $notificationId }}"
        class="fixed z-100 bottom-6 right-6 pointer-events-none border-2 rounded-lg border-primary">
        <div class="flex flex-col items-end space-y-3">
            <div id="notification-{{ $notificationId }}"
                class="max-w-sm w-full pointer-events-auto px-5 py-4 rounded-lg shadow-lg"
                data-id="{{ $notificationId }}">
                <div class="flex justify-center items-center gap-3">
                    <div class="text-xl {{ $type === 'error' ? 'text-red-500' : 'text-black' }}">
                        <div>{{ $message }}</div>
                    </div>

                    <div class="ml-2">
                        <button wire:click="close" class="text-md hover:text-secondary cursor-pointer">
                            ✕
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="hidden"></div>
@endif
