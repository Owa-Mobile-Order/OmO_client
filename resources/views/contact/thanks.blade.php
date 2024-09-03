@extends('layouts.common')
@section('title')
  お問い合わせ完了 | Owa Mobile Order
@endsection

@section('body')
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2
        class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 sm:text-3xl md:text-3xl"
      >
        お問い合わせ完了
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <p class="text-center text-lg leading-6 text-gray-900">
        お問い合わせありがとうございます。
        <br />
        送信が完了しました。
      </p>
      <div class="mt-6">
        <a
          href="/"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-base md:text-base"
        >
          ホームに戻る
        </a>
      </div>
    </div>
  </div>
@endsection
