@php
    $pageClass = $pageClass ?? 'main';
    $pageType  = $pageType ?? $pageClass;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ mix('css/style.css') }}" rel="stylesheet">

    </head>
    <body class="{{ $pageClass }}-page page antialiased">
        <main id="app">
            <div id="vue-app">
            </div>
        </main>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>

</html>
