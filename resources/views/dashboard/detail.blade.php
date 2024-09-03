@extends('layouts.common')
@section('title')
  注文詳細 | Owa Mobile Order
@endsection

@section('body')
  <div class="container mx-auto mt-5 px-4">
    <nav class="mb-4">
      <ol class="flex">
        <li>
          <a href="/dashboard" class="text-blue-500 hover:text-blue-700">
            注文一覧
          </a>
        </li>
        <li class="mx-2">/</li>
        <li class="text-gray-700">{{ $order['menuItem']['name'] }}</li>
      </ol>
    </nav>

    <h1 class="text-3xl font-bold mb-4">{{ $order['menuItem']['name'] }}</h1>
    <div class="flex flex-col md:flex-row">
      <div class="md:w-1/2 mb-4 md:mb-0 md:pr-4">
        <img
          src="{{ $order['menuItem']['image_path'] }}"
          alt="{{ $order['menuItem']['name'] }}"
          class="w-full rounded-lg"
        />
      </div>
      <div class="md:w-1/2 flex flex-col justify-between">
        <div class="mb-4">
          <h2 class="text-xl font-bold">{{ $order['user']['name'] }}</h2>
          <p class="text-gray-500">{{ $order['user']['student_code'] }}</p>
        </div>
        <p class="mb-4">
          {{ $order['menuItem']['description'] }}
        </p>
        <div class="mt-auto">
          <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4"
          >
            <div>
              <h3 class="text-2xl font-bold text-red-600">
                価格:
                <span id="price">¥{{ $order['menuItem']['price'] }}</span>
              </h3>
            </div>
          </div>
          <form method="POST" action="/dashboard/update/{{ $order['id'] }}">
            @csrf
            @method('PATCH')
            <div class="mb-4">
              <label for="status" class="block text-gray-700">ステータス</label>
              <select
                name="status"
                id="status"
                class="form-select mt-1 block w-full"
              >
                <option
                  value="pending"
                  {{ $order['status'] == 'pending' ? 'selected' : '' }}
                >
                  保留中
                </option>
                <option
                  value="completed"
                  {{ $order['status'] == 'completed' ? 'selected' : '' }}
                >
                  完了
                </option>
                <option
                  value="cancelled"
                  {{ $order['status'] == 'cancelled' ? 'selected' : '' }}
                >
                  キャンセル
                </option>
              </select>
            </div>
            <button
              type="submit"
              class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full transition duration-300 ease-in-out"
            >
              更新する
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
