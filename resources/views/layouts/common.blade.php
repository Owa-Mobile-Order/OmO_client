<head>
  <title>@yield('title')</title>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  @yield('head')

  @vite('resources/css/app.css')
</head>
<body>
  @include('components.header')
  @yield('body')
</body>
