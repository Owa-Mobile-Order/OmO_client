<section>
  <h2 class="text-xl font-medium text-gray-900">
    {{ __('アカウントを削除') }}
  </h2>
  <form
    method="post"
    action="{{ route('profile.destroy') }}"
    class="space-y-6"
  >
    @csrf
    @method('delete')
    <p class="mt-1 text-sm text-gray-600">
      {{ __('アカウントが削除されると、そのリソースとデータはすべて永久に削除されます。パスワードを入力して、アカウントの永久削除を希望することを確認してください。') }}
    </p>

    <div class="mt-6">
      <label for="password" class="sr-only">
        {{ __('Password') }}
      </label>
      <input
        id="password"
        name="password"
        type="password"
        class="mt-1 block w-3/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
        placeholder="{{ __('パスワードを入力') }}"
      />
    </div>

    <div class="flex items-center gap-4">
      <button
        type="submit"
        class="flex justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 sm:text-base md:text-base"
      >
        {{ __('アカウントを削除') }}
      </button>
    </div>
  </form>
</section>
