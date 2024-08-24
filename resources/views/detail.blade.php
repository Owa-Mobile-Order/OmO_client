<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $name }}詳細</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/script.js"></script>
  </head>
  <body class="bg-gray-100">
    <div class="container mx-auto mt-5 px-4">
      <nav class="mb-4">
        <ol class="flex">
          <li>
            <a href="list.html" class="text-blue-500 hover:text-blue-700">
              メニュー一覧
            </a>
          </li>
          <li class="mx-2">/</li>
          <li class="text-gray-700">醤油ラーメン</li>
        </ol>
      </nav>

      <h1 class="text-3xl font-bold mb-4">醤油ラーメン</h1>
      <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-4 md:mb-0 md:pr-4">
          <img
            src="https://placehold.co/600x400"
            alt="醤油ラーメン"
            class="w-full rounded-lg"
          />
        </div>
        <div class="md:w-1/2">
          <p class="mb-4">
            当店自慢の醤油ラーメンです。コクのある醤油スープと、もちもちの麺が絶妙にマッチします。トッピングには、チャーシュー、メンマ、ネギ、海苔が入っています。
          </p>

          <h4 class="text-xl font-semibold mb-2">栄養成分表示（1人前）</h4>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-4">
            <div class="bg-gray-200 p-2 rounded">
              <h6 class="font-semibold">エネルギー</h6>
              <p>450kcal</p>
            </div>
            <div class="bg-gray-200 p-2 rounded">
              <h6 class="font-semibold">たんぱく質</h6>
              <p>20g</p>
            </div>
            <div class="bg-gray-200 p-2 rounded">
              <h6 class="font-semibold">脂質</h6>
              <p>12g</p>
            </div>
            <div class="bg-gray-200 p-2 rounded">
              <h6 class="font-semibold">炭水化物</h6>
              <p>65g</p>
            </div>
            <div class="bg-gray-200 p-2 rounded">
              <h6 class="font-semibold">食塩相当量</h6>
              <p>6g</p>
            </div>
          </div>

          <h4 class="text-xl font-semibold mb-2">特定原材料</h4>
          <p class="mb-4">小麦、卵、大豆</p>

          <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4"
          >
            <div class="flex items-center mb-2 md:mb-0">
              <label for="quantity-shoyu" class="mr-2 text-lg">数量:</label>
              <div class="flex">
                <button
                  class="bg-gray-300 px-3 py-1 rounded-l"
                  type="button"
                  id="decrease-shoyu"
                >
                  -
                </button>
                <input
                  type="number"
                  id="quantity-shoyu"
                  class="w-16 text-center border-t border-b border-gray-300"
                  value="1"
                  min="1"
                />
                <button
                  class="bg-gray-300 px-3 py-1 rounded-r"
                  type="button"
                  id="increase-shoyu"
                >
                  +
                </button>
              </div>
            </div>
            <div>
              <h3 class="text-2xl font-bold text-red-600">
                価格:
                <span id="price-shoyu" data-base-price="800">¥800</span>
              </h3>
            </div>
          </div>

          <button
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full transition duration-300 ease-in-out order-button"
          >
            <i class="bi bi-cart-plus mr-2"></i>
            注文する
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
