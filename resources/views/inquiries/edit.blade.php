<x-layout.app>
    <div class="max-w-2xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Inquiry #{{ $inquiry->id }}</h1>

        <div class="bg-white rounded-lg shadow p-8">
            <form action="{{ route('inquiries.update', $inquiry) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $inquiry->name) }}" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $inquiry->email) }}" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                    @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $inquiry->phone) }}" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="company_name">Company</label>
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $inquiry->company_name) }}" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('company_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="website">Website</label>
                    <input type="url" name="website" id="website" value="{{ old('website', $inquiry->website) }}" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('website') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="type">Type</label>
                    <select name="type" id="type" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                        @foreach(['general', 'quote', 'support', 'partnership'] as $type)
                            <option value="{{ $type }}" @if(old('type', $inquiry->type) === $type) selected @endif>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                    @error('type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="status">Status</label>
                    <select name="status" id="status" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>
                        @foreach(['unread', 'read', 'archived', 'in progress', 'resolved', 'closed'] as $status)
                            <option value="{{ $status }}" @if(old('status', $inquiry->status) === $status) selected @endif>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="message">Message</label>
                    <textarea name="message" id="message" rows="5" class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500" required>{{ old('message', $inquiry->message) }}</textarea>
                    @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-between items-center mt-8">
                    <a href="{{ route('inquiries.show', $inquiry) }}" class="text-violet-700 hover:underline font-semibold">&larr; Cancel</a>
                    <button type="submit" class="bg-violet-700 text-white px-6 py-2 rounded hover:bg-violet-800 transition font-semibold">Update Inquiry</button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>