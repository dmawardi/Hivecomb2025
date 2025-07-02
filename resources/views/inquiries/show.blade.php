<x-layout.app>
    <div class="max-w-2xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Inquiry #{{ $inquiry->id }}</h1>

        <div class="bg-white rounded-lg shadow p-8">
            <dl class="divide-y divide-gray-200">
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Name</dt>
                    <dd class="text-gray-900">{{ $inquiry->name }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Email</dt>
                    <dd class="text-blue-700 underline">{{ $inquiry->email }}</dd>
                </div>
                @if($inquiry->phone)
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Phone</dt>
                    <dd class="text-gray-900">{{ $inquiry->phone }}</dd>
                </div>
                @endif
                @if($inquiry->company_name)
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Company</dt>
                    <dd class="text-gray-900">{{ $inquiry->company_name }}</dd>
                </div>
                @endif
                @if($inquiry->website)
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Website</dt>
                    <dd>
                        <a href="{{ $inquiry->website }}" target="_blank" class="text-blue-700 underline hover:text-blue-900">
                            {{ $inquiry->website }}
                        </a>
                    </dd>
                </div>
                @endif
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Type</dt>
                    <dd class="capitalize text-gray-900">{{ $inquiry->type }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Status</dt>
                    <dd>
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
                    </dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-semibold text-gray-600">Submitted At</dt>
                    <dd class="text-gray-900">{{ $inquiry->created_at->format('Y-m-d H:i') }}</dd>
                </div>
                <div class="py-4">
                    <dt class="font-semibold text-gray-600 mb-2">Message</dt>
                    <dd class="text-gray-900 whitespace-pre-line">{{ $inquiry->message }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-8 flex justify-between">
            <a href="{{ route('inquiries.index') }}" class="text-black hover:underline font-semibold">&larr; Back to Inquiries</a>
            <a href="{{ route('inquiries.edit', $inquiry) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-violet-700 transition">Edit Inquiry</a>
            <form action="{{ route('inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Delete</button>
            </form>
        </div>
    </div>
</x-layout.app>