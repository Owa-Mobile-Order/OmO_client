@extends('layouts.common')

@section('title')
  OmO - 学校食堂の予約サービス
@endsection

@section('body')
  <div class="container mx-auto mt-10 min-h-32">
    <div class="text-center">
      <img src="img/logo.png" alt="OmO Logo" class="mx-auto mb-4 h-40" />
      <h1 class="text-6xl font-bold">Owa Mobile Order</h1>

      <div class="mt-10">
        <svg
          class="w-12 h-12 mx-auto animate-bounce text-indigo-600"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </div>
    </div>
    <div class="mt-10">
      <h2 class="text-2xl font-semibold text-gray-800">OmOとは？</h2>
      <p class="mt-4 text-gray-600">
        OmOとは、学校食堂の予約サービスで、混雑を避け、スマホから簡単に予約ができます。
      </p>
      <p class="mt-2 text-gray-600">
        アカウント登録には配布された招待コードが必要です。
      </p>
    </div>
    <div class="mt-10">
      <h2 class="text-2xl font-semibold text-gray-800">開発状況について</h2>
      <p class="mt-4 text-gray-600">
        現在OmOは1人で開発し、α版として公開しています。不具合等は発見次第お問い合わせフォームから報告していただけると非常に助かります。
      </p>
      <p class="mt-2 text-gray-600">
        その他、欲しい機能、改善点等も報告していただけると嬉しいです。
      </p>
    </div>
    <div class="mt-10">
      <h2 class="text-2xl font-semibold text-gray-800">Links</h2>
      <p class="mt-4">
        <a
          href="https://github.com/Owa-Mobile-Order/OmO_client"
          class="text-indigo-600 hover:underline"
        >
          GitHub
        </a>
      </p>
    </div>
    <div class="mt-10 text-center">
      @auth
        <a
          href="/reserve"
          class="inline-block rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500"
        >
          予約する
        </a>
      @else
        <a
          href="/register"
          class="inline-block rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500"
        >
          アカウント新規作成
        </a>
      @endauth
    </div>
  </div>
@endsection
