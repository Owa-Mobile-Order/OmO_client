<script
  src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"
  defer
></script>

<div x-data="{ open: false }" class="fixed w-full bg-white">
  {{-- 全体 --}}
  <nav
    class="flex items-center justify-between lg:justify-start flex-wrap lg:flex-nowrap px-6 py-4 lg:px-24 lg:py-5"
  >
    {{-- ロゴ画像を表示する --}}
    <div class="flex items-center flex-shrink-0 text-black mr-6">
      <a href="/">
        <img class="h-8" src="/img/logo.png" alt="Logo" />
      </a>
    </div>

    {{-- メニューボタン --}}
    <div class="block lg:hidden">
      <button
        @click="open = !open"
        class="flex items-center px-3 py-2 text-black border-0 hover:text-gray-700 rounded-full hover:bg-gray-200 transition"
      >
        <svg
          class="fill-current h-3 w-3"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <title>Menu</title>
          <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z" />
        </svg>
      </button>
    </div>

    {{-- メニュー --}}
    <div
      class="mx-2 w-full lg:justify-between lg:w-full lg:flex lg:items-center"
      :class="{ 'block': open, 'hidden': !open }"
    >
      <div>
        <a
          href="/order"
          class="block mt-4 lg:inline-block lg:mt-0 mr-4 lg:mr-8 hover:underline"
        >
          予約
        </a>
        <a
          href="/terms"
          class="block mt-4 mr-4 lg:inline-block lg:mt-0 hover:underline"
        >
          利用規約
        </a>
        <a
          href="/privacy"
          class="block mt-4 lg:inline-block lg:mt-0 hover:underline"
        >
          プライバシーポリシー
        </a>
      </div>
      <hr class="my-4" :class="{ 'block': open, 'hidden': !open }" />
      <div class="flex flex-col lg:inline-block lg:mt-0">
        @guest
          <a href="/login" class="lg:mr-4 hover:underline">ログイン</a>
          <a href="/register" class="mt-4 lg:mt-0 hover:underline">新規登録</a>
        @else
          
        @endguest
      </div>
    </div>
  </nav>
  <hr class="border-gray-200 mx-4" />
</div>
