@props([
    'title' => 'Crafting Digital Experiences',
    'subtitle' => 'Innovative web solutions tailored to bring your brand to life.',
    'buttonText' => 'Get in Touch',
    'buttonLink' => '/contact',
])

<!-- Hero Section -->
<div class="block h-screen bg-violet-500 overflow-hidden">

    <!-- Content -->
    <div class="flex items-center justify-center h-full">
        <div class="text-center z-40">
            <h1 class="text-6xl font-bold text-gray-800">
                {{ $title }}
            </h1>
            <p class="text-2xl mt-4 text-bold text-gray-800">
                {{ $subtitle }}
            </p>
            <a href="{{ $buttonLink }}"
                class="mt-8 inline-block bg-yellow-400 text-gray-800 font-bold py-3 px-6 rounded-lg transform transition-all hover:scale-110">
                {{ $buttonText }}
            </a>
        </div>
    </div>
</div>