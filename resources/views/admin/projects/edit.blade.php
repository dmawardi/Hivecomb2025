<x-layout.app>
    <div class="max-w-2xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Project</h1>

        <div class="bg-white rounded-lg shadow p-8">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Project Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>{{ old('description', $project->description) }}</textarea>
                    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="url" class="block text-gray-700 font-semibold mb-1">Project URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url', $project->url) }}"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="client_name" class="block text-gray-700 font-semibold mb-1">Client Name</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('client_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="completion_date" class="block text-gray-700 font-semibold mb-1">Completion Date</label>
                    <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date', optional($project->completion_date)->format('Y-m-d')) }}"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('completion_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="technologies" class="block text-gray-700 font-semibold mb-1">Technologies (comma separated)</label>
                    <input type="text" name="technologies" id="technologies" value="{{ old('technologies', $project->technologies) }}"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('technologies') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="thumbnail_image" class="block text-gray-700 font-semibold mb-1">Thumbnail Image</label>
                    @if($project->thumbnail_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $project->thumbnail_image) }}" alt="Current Thumbnail" class="h-20 rounded shadow">
                        </div>
                    @endif
                    <input type="file" name="thumbnail_image" id="thumbnail_image"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    <p class="text-gray-500 text-xs mt-1">Leave blank to keep current image.</p>
                    @error('thumbnail_image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                        <option value="active" @selected(old('status', $project->status) === 'active')>Active</option>
                        <option value="inactive" @selected(old('status', $project->status) === 'inactive')>Inactive</option>
                        <option value="archived" @selected(old('status', $project->status) === 'archived')>Archived</option>
                    </select>
                    @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center">
                    <input type="hidden" name="featured" value="0">
                    <input type="checkbox" name="featured" id="featured" value="1" @checked(old('featured', $project->featured)) class="mr-2">
                    <label for="featured" class="text-gray-700 font-semibold">Featured Project</label>
                </div>

                <div class="flex justify-between items-center mt-8">
                    <a href="{{ route('admin.projects.index') }}" class="text-violet-700 hover:underline font-semibold">&larr; Cancel</a>
                    <button type="submit" class="bg-violet-700 text-white px-6 py-2 rounded hover:bg-violet-800 transition font-semibold">Update Project</button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>