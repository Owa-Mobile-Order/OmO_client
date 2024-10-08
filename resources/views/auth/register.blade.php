@extends('layouts.common')
@section('title')
  登録 | Owa Mobile Order
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
        OmOアカウントを作成する
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" method="POST" action="{{ route('register') }}">
        @csrf
        <div>
          <label
            for="name"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            名前
          </label>
          <div class="mt-2">
            <input
              id="name"
              name="name"
              type="text"
              autocomplete="name"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('name') is-invalid @enderror"
              value="{{ old('name') }}"
            />
            @error('name')
              <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div>
          <label
            for="email"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            メールアドレス
          </label>
          <div class="mt-2 flex space-x-2">
            <input
              id="email"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('email') is-invalid @enderror"
              value="{{ old('email') }}"
            />
            <input
              id="student_code"
              name="student_code"
              type="text"
              placeholder="招待コード"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('invitation_code') is-invalid @enderror"
              value="{{ old('student_code') }}"
            />
          </div>
          @error('email')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

          @error('student_code')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div>
          <label
            for="password"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            パスワード
          </label>
          <div class="mt-2">
            <input
              id="password"
              name="password"
              type="password"
              autocomplete="new-password"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3 @error('password') is-invalid @enderror"
            />
            @error('password')
              <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div>
          <label
            for="password-confirm"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            パスワード確認
          </label>
          <div class="mt-2">
            <input
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              autocomplete="new-password"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
            />
          </div>
        </div>

        <label
          for="terms"
          class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
        >
          <input
            id="terms"
            name="terms"
            type="checkbox"
            required
            class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
          />
          <a
            class="leading-6 text-indigo-600 hover:text-indigo-500"
            href="/terms"
          >
            利用規約
          </a>
          に同意する
        </label>
        @error('terms')
          <span class="invalid-feedback text-xs text-red-500" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

        <div class="flex justify-center text-center">
          {!! app('captcha')->display($attributes = [], $options = ['lang' => 'ja']) !!}
          @error('g-recaptcha-response')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <button
            type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
          >
            登録
          </button>
        </div>
      </form>

      <p
        class="mt-10 text-center text-sm text-gray-500 sm:text-base md:text-base"
      >
        すでにアカウントをお持ちですか？
        <a
          href="{{ route('login') }}"
          class="leading-6 text-indigo-600 hover:text-indigo-500"
        >
          ログイン
        </a>
      </p>
    </div>
  </div>
@endsection
