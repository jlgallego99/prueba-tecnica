<header class="bg-white shadow p-5 flex justify-between">
    <h1 class="text-primary text-xl font-bold">
        Mini-Trello
    </h1>

    <nav class="space-x-4">
        <div class="space-x-10">
            <a href="/dashboard" class="text-lg hover:underline hover:text-primary cursor-pointer">Dashboard</a>
            <a href="/audit" class="text-lg hover:underline hover:text-primary cursor-pointer">Audit</a>
            @auth
                <button wire:click='logout' class="hover:underline hover:text-primary cursor-pointer">Logout</a>
                @endauth
                @guest
                    <a href="/" class="hover:underline hover:text-primary cursor-pointer">Login</a>
                    <a href="/register" class="hover:underline hover:text-primary cursor-pointer">Register</a>
                @endguest
        </div>
    </nav>
</header>
