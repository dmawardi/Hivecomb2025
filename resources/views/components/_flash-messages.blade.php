@if(session('success') || session('error'))
    <div 
        id="flash-message"
        class="fixed top-20 right-6 z-50 transition-all duration-500"
        style="min-width: 300px;"
    >
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow mb-2 flex items-center" role="alert">
                <span class="block font-semibold flex-1">{{ session('success') }}</span>
                <button onclick="document.getElementById('flash-message').style.display='none'" class="ml-4 text-green-700 hover:text-green-900 text-xl leading-none">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded shadow flex items-center" role="alert">
                <span class="block font-semibold flex-1">{{ session('error') }}</span>
                <button onclick="document.getElementById('flash-message').style.display='none'" class="ml-4 text-red-700 hover:text-red-900 text-xl leading-none">&times;</button>
            </div>
        @endif
    </div>
    <script>
        setTimeout(function() {
            var flash = document.getElementById('flash-message');
            if (flash) flash.style.display = 'none';
        }, 5000);
    </script>
@endif