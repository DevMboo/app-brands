<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body>
        <main class="flex gap-3">
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
    @livewireScripts
    @vite('resources/js/app.js')
</html>
