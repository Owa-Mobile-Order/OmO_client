<section>
  <h2 class="text-xl font-medium text-gray-900">
    {{ __('パスワードを変更') }}
  </h2>
  <form
    method="post"
    action="{{ route('password.update') }}"
    class="mt-6 space-y-6"
  >
    @csrf
    @method('put')

    <div>
      <label
        for="update_password_current_password"
        class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
      >
        {{ __('現在のパスワード') }}
      </label>
      <div class="mt-2">
        <input
          id="update_password_current_password"
          name="current_password"
          type="password"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
          autocomplete="current-password"
        />
        @error('current_password')
          <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div>
      <label
        for="update_password_password"
        class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
      >
        {{ __('新しいパスワード') }}
      </label>
      <div class="mt-2">
        <input
          id="update_password_password"
          name="password"
          type="password"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
          autocomplete="new-password"
        />
        @error('password')
          <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div>
      <label
        for="update_password_password_confirmation"
        class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
      >
        {{ __('新しいパスワードの確認') }}
      </label>
      <div class="mt-2">
        <input
          id="update_password_password_confirmation"
          name="password_confirmation"
          type="password"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
          autocomplete="new-password"
        />
        @error('password_confirmation')
          <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex items-center gap-4">
      <button
        type="submit"
        class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
      >
        {{ __('保存') }}
      </button>
    </div>
  </form>
</section>
