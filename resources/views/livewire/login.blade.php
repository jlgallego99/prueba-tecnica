<div class="p-5 m-5 bg-white rounded-xl shadow w-1/4">
    <form wire:submit.prevent="submit">
        <div>
            <label for="email" class="text-md">Email</label>
            <div class="mt-2 border-1 border-black rounded-md">
                <input wire:model="email" type="email" placeholder="Email" class="w-full rounded-md text-black p-2" />
            </div>
        </div>

        <div class="mt-2">
            <label for="password" class="text-md">Password</label>
            <div class="mt-2 border-1 border-black rounded-md">
                <input wire:model="password" type="password" placeholder="Password"
                    class="w-full rounded-md text-black p-2" />
            </div>
        </div>

        <button type="submit" class="mt-5 rounded-md bg-primary text-white p-3 hover:bg-[#b7a5fc] cursor-pointer">
            Log in
        </button>
        @if ($errors->has('credentials'))
            <span class="text-red-500">{{ $errors->first('credentials') }}</span>
        @endif
    </form>
</div>
