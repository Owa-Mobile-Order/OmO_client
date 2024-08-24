@extends('layouts.common')
@section('title')
  商品詳細 | Owa Mobile Order
@endsection

@section('body')
  <div class="container mx-auto mt-5 px-4">
    <nav class="mb-4">
      <ol class="flex">
        <li>
          <a href="/order" class="text-blue-500 hover:text-blue-700">
            メニュー一覧
          </a>
        </li>
        <li class="mx-2">/</li>
        <li class="text-gray-700">{{ $item->name }}</li>
      </ol>
    </nav>

    <h1 class="text-3xl font-bold mb-4">{{ $item->name }}</h1>
    <div class="flex flex-col md:flex-row">
      <div class="md:w-1/2 mb-4 md:mb-0 md:pr-4">
        <img
          src="{{ $item->image_path }}"
          alt="{{ $item->name }}"
          class="w-full rounded-lg"
        />
      </div>
      <div class="md:w-1/2 flex flex-col justify-between">
        <p class="mb-4">
          {{ $item->description }}
        </p>
        <div class="mt-auto">
          <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4"
          >
            <div>
              <h3 class="text-2xl font-bold text-red-600">
                価格:
                <span id="price">¥{{ $item->price }}</span>
              </h3>
            </div>
          </div>
          <button
            {{ $item->is_available ? 'disabled' : '' }}
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full transition duration-300 ease-in-out order-button cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-400 disabled:hover:bg-gray-400 disabled:text-gray-700"
          >
            <i class="bi bi-cart-plus mr-2"></i>
            {{ $item->is_available ? '利用不可' : '注文する' }}
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection
