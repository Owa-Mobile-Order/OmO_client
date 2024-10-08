<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('head')
  </head>
  <body>
    <style>
      * {
        user-select: none;
      }
    </style>
    @include('components.header')
    <div class="pt-20 min-h-screen">
      @yield('body')
    </div>
    @include('components.footer')
  </body>
</html>
