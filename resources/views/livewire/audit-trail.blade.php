<div class="p-5 m-5 bg-white rounded-xl shadow w-full">
    <table class="table-auto w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                <th class="border border-gray-300 px-4 py-2 text-left">User Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Model Class</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Model ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $audit->action }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $audit->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $audit->auditable_id ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $audit->auditable_type ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $audit->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
