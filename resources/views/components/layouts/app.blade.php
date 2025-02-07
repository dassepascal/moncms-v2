<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- custom css --}}
     <link rel="stylesheet" href="{{ asset('storage/css/prism.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
    {{-- HERO --}}
    <div class="min-h-[35vw] hero" style="background-image: url({{ asset('storage/hero.jpg') }});">
        <div class="bg-opacity-60 hero-overlay"></div>
        <a href="{{ '/' }}">
            <div class="text-center hero-content text-neutral-content">
                <div>
                    <h1 class="mb-5 text-4xl font-bold sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl">
                        {{ config('app.title')}}
                    </h1>
                    <p class="mb-5 text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl">
                       {{ config('app.subTitle')}}
                    </p>
                </div>
            </div>
        </a>
    </div>

    {{-- NAVBAR --}}
    <livewire:navigation.navbar :$menus />

    {{-- MAIN --}}
    <x-main full-width>

        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit lg:hidden">
            <livewire:navigation.sidebar :$menus />
        </x-slot:sidebar>

        {{-- SLOT --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>

    </x-main>
     {{-- FOOTER --}}
    <hr><br>
    <livewire:navigation.footer />
    <br

    {{--  TOAST area --}}
    <x-toast />

    {{-- CUSTOM JS --}}
      <script src="{{ asset('storage/scripts/prism.js') }}"></script>
</body>

</html>
