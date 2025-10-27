<nav class="space-x-4">
    @auth
        <button wire:click='logout' class="hover:underline hover:text-primary">Logout</a>
    @endauth
    @guest
        <a href="/" class="hover:underline hover:text-primary">Login</a>
        <a href="/register" class="hover:underline hover:text-primary">Register</a>
    @endguest
</nav>
