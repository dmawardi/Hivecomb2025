<x-layout.app>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Update Profile</h1>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-1">New Password <span class="text-gray-400 text-xs">(leave blank to keep current)</span></label>
                    <input id="password" type="password" name="password"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirm New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                </div>

                <div>
                    <button type="submit" class="bg-violet-700 text-white px-6 py-2 rounded hover:bg-violet-800 transition font-semibold w-full">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>