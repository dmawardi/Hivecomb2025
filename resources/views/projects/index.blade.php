<x-layout.app :title="__('Our Work - Featured Projects by HiveComb')" 
    :description="__('Explore HiveComb’s portfolio of completed web projects. See how we help businesses grow with innovative web solutions.')" >
    <x-honeycomb-float>
        <div class="w-10/12 md:w-2/3 mx-auto relative z-40 bg-gray-700 rounded-md shadow-lg my-10">
            <div class="container mx-auto px-4 py-8 mt-6">
                <h1 class="text-4xl font-bold text-center mb-4 text-gray-100">Featured Projects</h1>
                <p class="text-center text-gray-300 max-w-2xl mx-auto mb-8">
                    Discover some of our recent work and see how we help clients achieve their digital goals.
                </p>

                <section class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @forelse($projects as $project)
                        <div class="bg-gray-800 rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                            <div class="mb-4">
                                <h2 class="text-2xl font-semibold text-amber-400 mb-2">
                                    <a href="{{ route('projects.show', $project) }}" class="hover:underline">
                                        {{ $project->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-400 text-sm mb-1">
                                    @if($project->client_name)
                                        <span class="font-medium">Client:</span> {{ $project->client_name }}
                                    @endif
                                </p>
                                <p class="text-gray-500 text-xs">
                                    Completed: {{ $project->completed_at ? $project->completed_at->format('F Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-200 mb-4">{{ Str::limit($project->description, 120) }}</p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('projects.show', $project) }}"
                                   class="inline-block bg-violet-600 text-white px-4 py-2 rounded hover:bg-violet-700 transition font-semibold">
                                    View Project
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-300 py-12">
                            No projects to display at this time.
                        </div>
                    @endforelse
                </section>

                <div class="mt-12 flex justify-center">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </x-honeycomb-float>
</x-layout.app>