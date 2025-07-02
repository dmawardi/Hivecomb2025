<x-layout.app>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-violet-500 focus:border-violet-500">
                    @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Remember Me</label>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-violet-700 text-white px-6 py-2 rounded hover:bg-violet-800 transition font-semibold w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.app>