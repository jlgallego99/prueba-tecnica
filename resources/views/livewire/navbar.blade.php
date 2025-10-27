<nav class="space-x-4">
    @auth
        <button wire:click='logout' class="hover:underline hover:text-primary cursor-pointer">Logout</a>
    @endauth
    @guest
        <a href="/" class="hover:underline hover:text-primary cursor-pointer">Login</a>
        <a href="/register" class="hover:underline hover:text-primary cursor-pointer">Register</a>
    @endguest
</nav>
