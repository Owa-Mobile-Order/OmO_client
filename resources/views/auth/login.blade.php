@extends('layouts.common')
@section('title')
  ログイン | Owa Mobile Order
@endsection

@section('body')
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img
        class="mx-auto h-10 w-auto sm:h-12"
        src="img/logo.png"
        alt="Your Company"
      />
      <h2
        class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 sm:text-3xl md:text-3xl"
      >
        OmOアカウントにログイン
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" method="POST" action="{{ route('login') }}">
        @csrf
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
              autocomplete="email"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('email') is-invalid @enderror"
              value="{{ old('email') }}"
            />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label
              for="password"
              class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
            >
              パスワード
            </label>
            <div class="text-sm sm:text-base md:text-base">
              @if (Route::has('password.request'))
                <a
                  href="{{ route('password.request') }}"
                  class="text-indigo-600 hover:text-indigo-500"
                >
                  パスワードをお忘れですか？
                </a>
              @endif
            </div>
          </div>
          <div class="mt-2">
            <input
              id="password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('password') is-invalid @enderror"
            />
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 offset-md-4">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="remember_me"
                id="remember_me"
                {{ old('remember_me') ? 'checked' : '' }}
              />

              <label class="form-check-label" for="remember">
                {{ __('ログインしたままにする') }}
              </label>
            </div>
          </div>
        </div>

        <div>
          <button
            type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
          >
            ログイン
          </button>
        </div>
      </form>

      <p
        class="mt-10 text-center text-sm text-gray-500 sm:text-base md:text-base"
      >
        アカウントがありませんか？
        <a
          href="{{ route('register') }}"
          class="leading-6 text-indigo-600 hover:text-indigo-500"
        >
          OmOアカウントを作成する
        </a>
      </p>
    </div>
  </div>
@endsection
