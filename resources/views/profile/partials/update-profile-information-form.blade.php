<section>
  <h2 class="text-xl font-medium text-gray-900">
    {{ __('アカウント情報を変更') }}
  </h2>
  <form
    method="post"
    action="{{ route('profile.update') }}"
    class="mt-6 space-y-6"
  >
    @csrf
    @method('patch')

    <div>
      <label
        for="name"
        class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
      >
        ユーザー名
      </label>
      <div class="mt-2">
        <input
          id="name"
          name="name"
          type="text"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
          value="{{ old('name', $user->name) }}"
          required
          autofocus
          autocomplete="name"
        />
      </div>
    </div>

    <div>
      <label
        for="email"
        class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
      >
        メールアドレス
      </label>
      <div class="mt-2">
        <input
          id="email"
          name="email"
          type="email"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
          value="{{ old('email', $user->email) }}"
          required
          autocomplete="username"
        />
      </div>
    </div>

    <div class="flex items-center gap-4">
      <button
        type="submit"
        class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
      >
        保存する
      </button>
    </div>
  </form>
</section>
