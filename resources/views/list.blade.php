<?php
$data = [
  'name' => '醤油ラーメン',
  'id' => 'syoyu_ramen',
]; ?>

    <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>今日のメニュー</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5 px-4">
    <ul class="flex mb-4 space-x-2" id="menuTabs" role="tablist">
        <li role="presentation">
            <button class="px-4 py-2 rounded-full bg-blue-500 text-white" id="all-tab" data-category="all" type="button"
                    role="tab" aria-controls="all" aria-selected="true">すべて
            </button>
        </li>
        <li role="presentation">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
                    id="noodles-tab" data-category="noodles" type="button" role="tab" aria-controls="noodles"
                    aria-selected="false">麺類
            </button>
        </li>
        <li role="presentation">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
                    id="donburi-tab" data-category="donburi" type="button" role="tab" aria-controls="donburi"
                    aria-selected="false">丼類
            </button>
        </li>
        <li role="presentation">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
                    id="teishoku-tab" data-category="teishoku" type="button" role="tab" aria-controls="teishoku"
                    aria-selected="false">定食
            </button>
        </li>
        <li role="presentation">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
                    id="others-tab" data-category="others" type="button" role="tab" aria-controls="others"
                    aria-selected="false">その他
            </button>
        </li>
    </ul>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="menuItems">
        @foreach($items as $item)
            <div class="mb-4" data-category="{{ $item["category"] }}">
                <a href="/detail/{{ $item["id"] }}" class="text-decoration-none text-gray-900">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="https://placehold.jp/300x300.png" class="w-full h-48 object-cover" alt="{{ $item["name"] }}">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <h5 class="text-lg font-semibold mb-0">{{ $item["name"] }}</h5>
                                <p class="mb-0"><strong class="text-2xl text-red-600">¥800</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
