@extends('layouts.common')
@section('title')
  予約 | Owa Mobile Order
@endsection

@section('head')
  <link rel="stylesheet" href="/css/style.css" />
  <script src="/js/menu_filter.js"></script>
@endsection

@section('body')
  <div class="container mx-auto px-4">
    <ul class="flex mb-4 space-x-2" id="menuTabs" role="tablist">
      <li role="presentation">
        <button
          class="px-4 py-2 rounded-full bg-blue-500 text-white"
          id="all-tab"
          data-category="all"
          type="button"
          role="tab"
          aria-controls="all"
          aria-selected="true"
        >
          すべて
        </button>
      </li>
      <li role="presentation">
        <button
          class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
          id="noodles-tab"
          data-category="1"
          type="button"
          role="tab"
          aria-controls="1"
          aria-selected="false"
        >
          麺類
        </button>
      </li>
      <li role="presentation">
        <button
          class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
          id="donburi-tab"
          data-category="2"
          type="button"
          role="tab"
          aria-controls="2"
          aria-selected="false"
        >
          丼類
        </button>
      </li>
      <li role="presentation">
        <button
          class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
          id="teishoku-tab"
          data-category="3"
          type="button"
          role="tab"
          aria-controls="3"
          aria-selected="false"
        >
          定食
        </button>
      </li>
      <li role="presentation">
        <button
          class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
          id="others-tab"
          data-category="4"
          type="button"
          role="tab"
          aria-controls="4"
          aria-selected="false"
        >
          その他
        </button>
      </li>
    </ul>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="menuItems">
      @foreach ($items as $item)
        <div class="mb-4" data-category="{{ $item->category_id }}">
          <a
            href="/detail/{{ $item->id }}"
            class="text-decoration-none text-gray-900"
          >
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <img
                src="{{ $item->image_path }}"
                class="w-full h-48 object-cover"
                alt="{{ $item->name }}"
              />
              <div class="p-4">
                <div class="flex justify-between items-center">
                  <h5 class="text-lg font-semibold mb-0">
                    {{ $item->name }}
                  </h5>
                  <p class="mb-0">
                    <strong class="text-2xl text-red-600">
                      ¥{{ $item->price }}
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
