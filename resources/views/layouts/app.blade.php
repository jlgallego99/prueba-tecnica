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

    <script>
        const columns = document.querySelectorAll(".task-column");
        columns.forEach(zone => {
            zone.addEventListener("dragover", e => e.preventDefault());

            zone.addEventListener("drop", e => {
                e.preventDefault();

                const taskId = e.dataTransfer.getData('text/plain');
                const newStatus = zone.dataset.status;
                console.log(`Task ${taskId} dropped in ${newStatus}`);
            });
        });

        const tasks = document.querySelectorAll(".task");
        tasks.forEach(task => {
            task.addEventListener("dragstart", e => {
                e.dataTransfer.setData("text/plain", task.dataset.id);
            });
        });
    </script>
</body>

</html>
