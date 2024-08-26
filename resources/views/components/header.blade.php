<script
  src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"
  defer
></script>
<script src="/js/modal.js" defer></script>

<div x-data="{ open: false }" class="fixed w-full bg-white">
  <!-- 全体 -->
  <nav
    class="flex items-center justify-between lg:justify-start flex-wrap lg:flex-nowrap px-6 pt-4 pb-2 lg:px-24 lg:py-5"
  >
    <!-- ロゴ画像を表示する -->
    <div class="flex items-center flex-shrink-0 text-black mr-6">
      <a href="/">
        <img class="h-8" src="/img/logo.png" alt="Logo" />
      </a>
    </div>

    <!-- メニューボタン -->
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

    <!-- メニュー -->
    <div
      class="w-full px-1 lg:justify-between lg:w-full lg:flex lg:items-center"
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
      <div class="flex flex-col lg:inline-block lg:mt-0">
        <!-- ログイン/ログアウト時のメニュー -->
        @guest
          <a href="/login" class="lg:mr-4 hover:underline">ログイン</a>
          <a href="/register" class="mt-4 lg:mt-0 hover:underline">新規登録</a>
        @else
          <!-- スマホの時のメニュー -->
          <div class="block lg:hidden">
            <hr class="border-gray-200 m-2" />
            <div class="flex flex-col items-start my-auto">
              <div class="flex">
                <img
                  class="h-10 rounded-full mr-2"
                  src="{{ Auth::user()->avatar_path }}"
                  alt="avatar"
                />
                <div class="flex-col flex">
                  <p class="text-xl mt-2">{{ Auth::user()->name }}</p>
                  <div class="py-3">
                    <a
                      href="/settings"
                      class="block text-gray-700 hover:text-gray-900 hover:underline"
                    >
                      アカウント設定
                    </a>
                    <a
                      class="block text-red-700 hover:text-red-900 hover:underline"
                      href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    >
                      ログアウト
                    </a>
                    <form
                      id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none"
                    >
                      @csrf
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- PCの時のメニュー -->
          <div class="hidden lg:block">
            <!-- Modal Structure -->
            <div
              id="user-modal"
              class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-10"
            >
              <ul>
                <li>
                  <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">
                    Profile
                  </a>
                </li>
                <li>
                  <a href="/settings" class="block px-4 py-2 hover:bg-gray-100">
                    Settings
                  </a>
                </li>
                <li>
                  <a href="/logout" class="block px-4 py-2 hover:bg-gray-100">
                    Logout
                  </a>
                </li>
              </ul>
            </div>

            <!-- User Info -->
            <div
              class="flex relative cursor-pointer select-none"
              id="user-info"
            >
              <img
                class="h-10 mx-2 rounded-full"
                src="{{ Auth::user()->avatar_path }}"
                alt="avatar"
              />
              <p class="text-lg my-auto">{{ Auth::user()->name }}</p>
            </div>
          </div>
        @endguest
      </div>
    </div>
  </nav>
  <hr class="border-gray-200 mx-4" />
</div>
