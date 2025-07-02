@props(['route' => 'inquiries.index'])
<form method="GET" action="{{ $route }}" class="p-4 flex items-center gap-2 border-b border-gray-200 bg-gray-50">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search inquiries..."
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-violet-300"
    >
    <button
        type="submit"
        class="px-4 py-2 bg-violet-600 text-white rounded hover:bg-violet-700 transition"
    >
        Search
    </button>
</form>
                