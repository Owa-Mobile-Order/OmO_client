@extends('layouts.common')

@section('body')
  <div class="font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
      <h1 class="text-3xl font-bold mb-6 text-center">
        @yield('heading')
      </h1>

      <div class="px-8 pt-6 pb-8 mb-4">
        @yield('content')
      </div>
    </div>
  </div>
@endsection
