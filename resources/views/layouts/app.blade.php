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
        <livewire:navbar />
    </header>

    <main class="flex justify-center">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
