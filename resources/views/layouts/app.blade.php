<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-33 text-left flex lg:inline-flex">
                            Welcome, {{ auth()->user()->name }}!
                            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                                 height="22" viewBox="0 0 22 22">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path fill="#222"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                </g>
                            </svg>
                        </button>
                    </x-slot>

                    @can('admin')
                        <x-dropdown-item href="/admin/posts" :active="request()->RouteIs('admin.dashboard')">Dashboard</x-dropdown-item>
                        <x-dropdown-item href="/admin/posts/create" :active="request()->RouteIs('admin.posts.create')">New Post</x-dropdown-item>
                    @endcan

                        <x-dropdown-item href="#"
                                     x-data="{}"
                                     @click.prevent="document.querySelector('#logout-form').submit()"
                    >Log Out</x-dropdown-item>

                    <form id="logout-form" action="/logout" method="POST" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>

            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
            @endauth

            <a href="#website" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    @yield('content')

    <footer id=website class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <div>
                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
</body>