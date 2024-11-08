<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body>
        <main class="flex md:gap-3 overflow-x-hidden" x-data="{ isOpen: false }">
            <livewire:pages.components.side-bar />

            <div class="flex flex-col w-screen">
                <livewire:pages.components.header />
                
                <div>
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- TOASTS START -->
        <livewire:pages.components.toast /><!-- TOASTS END -->
    </body>
    
    @vite('resources/js/app.js')
    @livewireScripts
    @livewireChartsScripts
</html>
