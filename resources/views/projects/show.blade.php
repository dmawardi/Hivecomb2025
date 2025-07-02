<x-layout.app :title="$project->name">
    <x-honeycomb-float>
        <div class="w-10/12 md:w-2/3 mx-auto relative z-40 bg-gray-700 rounded-md shadow-lg my-10">
            <div class="container mx-auto px-4 py-8 mt-6">
                <div class="flex flex-col md:flex-row gap-8">
                    @if($project->thumbnail_image)
                        <div class="md:w-1/3 flex-shrink-0 flex justify-center items-start">
                            <img src="{{ asset('storage/' . $project->thumbnail_image) }}" alt="{{ $project->name }} thumbnail"
                                 class="rounded-lg shadow-lg w-full max-w-xs object-cover bg-gray-900">
                        </div>
                    @endif
                    <div class="flex-1">
                        <h1 class="text-4xl font-bold text-amber-400 mb-2">{{ $project->name }}</h1>
                        <div class="mb-4 flex flex-wrap gap-2 items-center">
                            @if($project->client_name)
                                <span class="bg-gray-800 text-gray-200 px-3 py-1 rounded-full text-xs font-semibold">Client: {{ $project->client_name }}</span>
                            @endif
                            <span class="bg-violet-800 text-violet-100 px-3 py-1 rounded-full text-xs font-semibold">
                                Status: {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        @if($project->completion_date)
                            <p class="text-gray-400 mb-2 text-sm">
                                <span class="font-medium">Completed:</span>
                                {{ \Carbon\Carbon::parse($project->completion_date)->format('F Y') }}
                            </p>
                        @endif
                        @if($project->url)
                            <p class="mb-4">
                                <a href="{{ $project->url }}" target="_blank" rel="noopener"
                                   class="text-violet-400 hover:underline break-all">
                                    {{ $project->url }}
                                </a>
                            </p>
                        @endif
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-100 mb-2">Description</h2>
                            <p class="text-gray-200 whitespace-pre-line">{{ $project->description }}</p>
                        </div>
                        @if($project->technologies)
                            <div class="mb-6">
                                <h2 class="text-lg font-semibold text-gray-100 mb-2">Technologies Used</h2>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(',', $project->technologies) as $tech)
                                        <span class="bg-violet-900 text-violet-100 px-2 py-1 rounded text-xs font-medium">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('projects.index') }}" class="text-violet-400 hover:underline font-semibold">&larr; Back to Projects</a>
                </div>
            </div>
        </div>
    </x-honeycomb-float>
</x-layout.app>