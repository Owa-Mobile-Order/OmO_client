@extends('layouts.common')
@section('title')
  お問い合わせ | Owa Mobile Order
@endsection

@section('body')
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2
        class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 sm:text-3xl md:text-3xl"
      >
        お問い合わせ
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="/contact" method="POST">
        @csrf
        <input type="hidden" name="name" value="{{ Auth::user()->name }}" />
        <input
          type="hidden"
          name="student_code"
          value="{{ Auth::user()->student_code }}"
        />

        <div>
          <label
            for="title"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            タイトル
          </label>
          <div class="mt-2">
            <input
              id="title"
              name="title"
              type="text"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
            />
          </div>
        </div>

        <div>
          <label
            for="description"
            class="block text-sm font-medium leading-6 text-gray-900 sm:text-base md:text-base"
          >
            本文
          </label>
          <div class="mt-2">
            <textarea
              id="description"
              name="description"
              required
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 md:text-base md:leading-7 lg:leading-7 px-3"
            ></textarea>
          </div>
        </div>

        <div>
          <button
            type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
          >
            送信
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
