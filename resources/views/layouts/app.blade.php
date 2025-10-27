<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Trello</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow p-5 flex justify-between">
        <h1 class="text-primary text-xl font-bold">
            Mini-Trello
        </h1>
        <nav class="space-x-4">
            <a href="/login" class="hover:underline hover:text-primary">Login</a>
            <a href="/register" class="hover:underline hover:text-primary">Register</a>
        </nav>
    </header>

    <main class="p-5 m-5 bg-white rounded-xl shadow">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
