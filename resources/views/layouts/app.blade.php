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
    <livewire:navbar />

    <main class="flex justify-center">
        {{ $slot }}
    </main>

    <livewire:notification />
    @livewireScripts
    @stack('scripts')
</body>

</html>
