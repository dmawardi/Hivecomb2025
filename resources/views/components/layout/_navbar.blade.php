<nav id="main-navbar" class="bg-gray-800 border-b border-gray-700 fixed top-0 w-full z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-navigation.nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-navigation.nav-link>
                    <x-navigation.nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-navigation.nav-link>
                    @guest
                    <x-navigation.nav-link :href="route('inquiries.create')" :active="request()->routeIs('inquiries.create')">
                        {{ __('Contact') }}
                    </x-navigation.nav-link>
                    <x-navigation.nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                        {{ __('Projects') }}
                    </x-navigation.nav-link>
                    @endguest

                    @auth
                        <x-navigation.nav-link :href="route('inquiries.index')" :active="request()->routeIs('inquiries.create')">
                            {{ __('Inquiries') }}
                        </x-navigation.nav-link>
                        <x-navigation.nav-link :href="route('admin.projects.index')" :active="request()->routeIs('projects.index')">
                            {{ __('Projects') }}
                        </x-navigation.nav-link>
                        {{-- Logout --}}
                        <form class="flex align-middle" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button id="navbar-toggle"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                    aria-label="Toggle navigation" aria-expanded="false">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="navbar-icon-open" class=""
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path id="navbar-icon-close" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                 </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="responsive-navbar" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-navigation.responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-navigation.responsive-nav-link>
            @guest
            <x-navigation.responsive-nav-link :href="route('inquiries.create')" :active="request()->routeIs('inquiries.create')">
                {{ __('Contact') }}
            </x-navigation.responsive-nav-link>
            <x-navigation.responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                {{ __('Projects') }}
            </x-navigation.responsive-nav-link>
            @endguest
            @auth
            <x-navigation.responsive-nav-link :href="route('inquiries.index')" :active="request()->routeIs('inquiries.create')">
                {{ __('Inquiries') }}
            </x-navigation.responsive-nav-link>
            <x-navigation.responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('projects.index')">
                {{ __('Projects') }}
            </x-navigation.responsive-nav-link>
            <form class="flex align-middle" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out">
                    {{ __('Logout') }}
                </button>
            </form>
            @endauth
        </div>
    </div>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Get references to the toggle button, menu, and icons
            const toggle = document.getElementById('navbar-toggle');
            const menu = document.getElementById('responsive-navbar');
            const iconOpen = document.getElementById('navbar-icon-open');
            const iconClose = document.getElementById('navbar-icon-close');

            // Add click event listener to the toggle button
            toggle.addEventListener('click', function () {
            // Toggle the visibility of the responsive menu
            const isOpen = menu.classList.toggle('hidden');
            // Toggle the hamburger and close icons based on menu state
            if (menu.classList.contains('hidden')) {
                // If the menu is hidden, show the open icon and hide the close icon
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            } else {
                // If the menu is visible, show the close icon and hide the open icon
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
                toggle.setAttribute('aria-expanded', 'true');
            }
            });
        });
    </script>
</nav>