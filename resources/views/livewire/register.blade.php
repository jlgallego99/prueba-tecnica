<div class="p-5 m-5 bg-white rounded-xl shadow w-1/4">
    <form wire:submit.prevent="submit">
        <div>
            <label for="name" class="text-md">Name</label>
            <div class="mt-2 border border-black rounded-md">
                <input wire:model="name" type="text" placeholder="Your full name"
                    class="w-full rounded-md text-black p-2" />
            </div>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="text-md">Email</label>
            <div class="mt-2 border border-black rounded-md">
                <input wire:model="email" type="email" placeholder="Email" class="w-full rounded-md text-black p-2" />
            </div>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="text-md">Password</label>
            <div class="mt-2 border border-black rounded-md">
                <input wire:model="password" type="password" placeholder="Password"
                    class="w-full rounded-md text-black p-2" />
            </div>
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="text-md">Confirm Password</label>
            <div class="mt-2 border border-black rounded-md">
                <input wire:model="password_confirmation" type="password" placeholder="Confirm Password"
                    class="w-full rounded-md text-black p-2" />
            </div>
        </div>

        <button type="submit"
            class="mt-5 w-full rounded-md bg-primary text-white p-3 hover:bg-[#b7a5fc] cursor-pointer">
            Register
        </button>
    </form>
</div>
