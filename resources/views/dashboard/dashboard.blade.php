@extends('layouts.common')
@section('title')
  注文管理 | Owa Mobile Order
@endsection

@section('head')
  
@endsection

@section('body')
  <script>
    // ページを30秒ごとにリロードする
    setTimeout(function () {
      location.reload();
    }, 30000); // 30000ミリ秒 = 30秒
  </script>
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="menuItems">
      @foreach ($orders as $order)
        <div class="mb-4" data-status="{{ $order['status'] }}">
          <a
            href="/dashboard/{{ $order['id'] }}"
            class="text-decoration-none text-gray-900"
          >
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <div class="p-4">
                <h2 class="text-xl font-bold">{{ $order['user']['name'] }}</h2>
                <p class="text-gray-500">
                  {{ $order['user']['student_code'] }}
                </p>
              </div>
              <img
                src="{{ $order['menu_item']['image_path'] }}"
                class="w-full h-48 object-cover"
                alt="{{ $order['menu_item']['name'] }}"
              />
              <div class="p-4">
                <div class="flex justify-between items-center">
                  <h5 class="text-lg font-semibold mb-0">
                    {{ $order['menu_item']['name'] }}
                  </h5>
                  <p class="mb-0">
                    <strong class="text-2xl text-red-600">
                      ¥{{ $order['menu_item']['price'] }}
                    </strong>
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
