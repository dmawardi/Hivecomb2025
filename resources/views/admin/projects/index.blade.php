<x-layout.app>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Projects</h1>

        @if($projects->count())
            <div class="overflow-x-auto rounded-lg shadow bg-white">
                <x-_search-bar :route="route('admin.projects.index')" />
                <div class="flex justify-end px-6 py-4">
                    <a href="{{ route('admin.projects.create') }}"
                       class="inline-block bg-violet-600 hover:bg-violet-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                        + New Project
                    </a>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($projects as $project)
                            <tr class="hover:bg-violet-50 transition">
                                <td class="px-4 py-3 text-gray-700">
                                    <a href="{{ route('projects.show', $project) }}" class="text-violet-700 font-bold underline hover:text-violet-900 transition">
                                        {{ $project->id }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-700 font-semibold">{{ $project->name }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $project->client_name ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                        @if($project->status === 'active') bg-blue-100 text-blue-800
                                        @elseif($project->status === 'completed') bg-green-100 text-green-800
                                        @elseif($project->status === 'archived') bg-gray-200 text-gray-700
                                        @else bg-yellow-100 text-yellow-800
                                        @endif
                                    ">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $project->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $projects->links() }}
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow mt-8" role="alert">
                <p class="font-bold">No projects found.</p>
                <p>There are currently no projects to display.</p>
            </div>
        @endif
    </div>
</x-layout.app>