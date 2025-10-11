<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ dark: false }"
    x-bind:class="{ dark }"
    x-init="() => {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            dark = true
        }
    }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Livewire Tables</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 dark:bg-gray-900 transition" x-cloak>
    @yield('content')
</body>
</html>
