<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="h-full font-inter">

    <div class="min-h-full dark:bg-black">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="/">
                                <img class="size-8" src="{{ Vite::asset('resources/images/logo.svg') }}"
                                    alt="Your Company">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                <x-nav-link href="/skills" :active="request()->is('skills')">Skills</x-nav-link>
                                <x-nav-link href="/project" :active="request()->is('project')">Projects</x-nav-link>
                                <x-nav-link href="/resume" :active="request()->is('resume')">Resume</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6 gap-x-2">
                            @guest
                            <x-nav-link href="/login">Sign in</x-nav-link>
                            <x-nav-link href="/register">Register</x-nav-link>
                            @endguest

                            @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign
                                    out</button>
                            </form>
                            @endauth

                            <button id="theme-toggle" type="button"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md text-sm font-medium p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 hidden" id="theme-toggle-light-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 hidden" id="theme-toggle-dark-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                                </svg>
                            </button>

                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                            aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" data-slot="icon" id="mobile-menu-toggle-open-icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" data-slot="icon" id="mobile-menu-toggle-close-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="hidden md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <x-nav-link-mobile href="/" :active="request()->is('/')">Home</x-nav-link-mobile>
                    <x-nav-link-mobile href="/about" :active="request()->is('about')">About</x-nav-link-mobile>
                    <x-nav-link-mobile href="/skills" :active="request()->is('skills')">Skills</x-nav-link-mobile>
                    <x-nav-link-mobile href="/project" :active="request()->is('project')">Projects</x-nav-link-mobile>
                    <x-nav-link-mobile href="/resume" :active="request()->is('resume')">Resume</x-nav-link-mobile>
                    <x-nav-link-mobile href="/contact" :active="request()->is('contact')">Contact</x-nav-link-mobile>
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                        @guest
                        <x-nav-link-mobile href="/login">Sign in</x-nav-link-mobile>
                        <x-nav-link-mobile href="/register">Register</x-nav-link-mobile>
                        @endguest

                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-sm font-medium">Sign
                                out</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white dark:bg-gray-900 shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $heading }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 dark:text-white">
                {{ $slot }}
            </div>
        </main>

    </div>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleDarkIcon.classList.remove('hidden');
        } else {
            themeToggleLightIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
        });

        const mobileMenuBtn = document.getElementById('mobile-menu-button');

        const menuToggleOpenIcon = document.getElementById('mobile-menu-toggle-open-icon');
        const menuToggleCloseIcon = document.getElementById('mobile-menu-toggle-close-icon');

        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function() {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                menuToggleCloseIcon.classList.remove('hidden');
                menuToggleOpenIcon.classList.add('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                menuToggleCloseIcon.classList.add('hidden');
                menuToggleOpenIcon.classList.remove('hidden');
            }
        }) 

    </script>

</body>

</html>