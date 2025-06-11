<div class="min-h-screen relative overflow-hidden">
    {{ $slot }}

    <!-- Floating Images Component -->
    <img id="honeycomb-1" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-6/12 h-6/12 top-24 left-10 z-30" />
    <img id="honeycomb-2" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-2/12 h-2/12 bottom-1/4 right-3/4 z-10" />
    <img id="honeycomb-3" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-5/12 h-5/12 top-3/4 right-3/4 z-30" />
    <img id="honeycomb-4" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-3/12 h-3/12 bottom-12 left-1/4 z-10" />
    <img id="honeycomb-5" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-4/12 h-4/12 top-1/3 right-20 z-10" />
    <img id="honeycomb-6" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-4/12 h-4/12 top-11 left-1/3 z-10" />
    <img id="honeycomb-7" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-2/12 h-2/12 bottom-24 -right-6 z-10" />
    <img id="honeycomb-8" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-3/12 h-3/12 top-12 -right-14 z-10" />
    <img id="honeycomb-9" src="{{ asset('/images/honeycomb.png') }}" alt="Interactive Honeycomb" class="fixed w-8/12 h-8/12 top-2/3 left-1/3 z-30" />

    <script>
        document.addEventListener('mousemove', function(e) {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            document.getElementById('honeycomb-1').style.transform = `translate3d(${mouseX / -30}px, ${mouseY / -30}px, 0)`;
            document.getElementById('honeycomb-2').style.transform = `translate3d(${mouseX / -30}px, ${mouseY / -30}px, 0)`;
            document.getElementById('honeycomb-3').style.transform = `translate3d(${mouseX / -17}px, ${mouseY / -17}px, 0)`;
            document.getElementById('honeycomb-4').style.transform = `translate3d(${mouseX / -18}px, ${mouseY / -18}px, 0)`;
            document.getElementById('honeycomb-5').style.transform = `translate3d(${mouseX / -20}px, ${mouseY / -20}px, 0)`;
            document.getElementById('honeycomb-6').style.transform = `translate3d(${mouseX / -20}px, ${mouseY / -20}px, 0)`;
            document.getElementById('honeycomb-7').style.transform = `translate3d(${mouseX / -30}px, ${mouseY / -30}px, 0)`;
            document.getElementById('honeycomb-8').style.transform = `translate3d(${mouseX / -25}px, ${mouseY / -25}px, 0)`;
            document.getElementById('honeycomb-9').style.transform = `translate3d(${mouseX / -8}px, ${mouseY / -8}px, 0)`;
        });
    </script>
</div>