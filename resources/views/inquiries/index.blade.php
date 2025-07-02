<x-layout.app>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Inquiries</h1>

        @if($inquiries->count())
            <div class="overflow-x-auto rounded-lg shadow bg-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($inquiries as $inquiry)
                            <tr class="hover:bg-violet-50 transition">
                                <td class="px-4 py-3 text-gray-700">
                                    <a href="{{ route('inquiries.show', $inquiry) }}" class="text-violet-700 font-bold underline hover:text-violet-900 transition">
                                        {{ $inquiry->id }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-700 font-semibold">{{ $inquiry->name }}</td>
                                <td class="px-4 py-3 text-blue-700 underline">{{ $inquiry->email }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ Str::limit($inquiry->message, 50) }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                        @if($inquiry->status === 'unread') bg-yellow-100 text-yellow-800
                                        @elseif($inquiry->status === 'read') bg-blue-100 text-blue-800
                                        @elseif($inquiry->status === 'archived') bg-gray-200 text-gray-700
                                        @elseif($inquiry->status === 'in progress') bg-violet-100 text-violet-800
                                        @elseif($inquiry->status === 'resolved') bg-green-100 text-green-800
                                        @elseif($inquiry->status === 'closed') bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ ucfirst($inquiry->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $inquiry->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $inquiries->links() }}
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow mt-8" role="alert">
                <p class="font-bold">No inquiries found.</p>
                <p>There are currently no inquiries to display.</p>
            </div>
        @endif
    </div>
</x-layout.app>