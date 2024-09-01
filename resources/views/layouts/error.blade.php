<!-- resources/views/layouts/error.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @vite('resources/css/app.css')
    <title>@yield('code') @yield('text') | Owa Mobile Order</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body class="flex flex-col min-h-screen">
    @include('components.header')
    <div class="flex flex-col items-center justify-center flex-grow">
      <div class="text-center flex items-center">
        <h1 class="text-6xl font-bold text-gray-800">@yield('code')</h1>
        <hr class="mx-4 h-16 border-l border-gray-800" />
        <p class="text-xl text-gray-800">@yield('text')</p>
      </div>
    </div>
    <footer class="text-center text-gray-600 m-2">
      &copy;2024 Harukoto All Rights Reserved
    </footer>
  </body>
</html>
