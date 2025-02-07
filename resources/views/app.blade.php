<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Cache-control" content="private, no-store, no-cache, must-revalidate, proxy-revalidate" />
        <meta http-equiv="Expires" content="Sat, 05 Nov 1955 00:00:00 EST" />
        <meta name="robots" content="index, follow" />
        <meta name="referer" content="origin" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- csrf token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
        <link rel="icon" type="image/x-icon" href="../../img/favicons/icons8-webex-windows-11-color-16.png">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
