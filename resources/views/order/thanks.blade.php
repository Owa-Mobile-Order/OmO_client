@extends('layouts.common')

@section('title')
  注文完了 | Owa Mobile Order
@endsection

@section('body')
  @php
    session()->forget('order_completed');
  @endphp

  <div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-4">注文ありがとうございます！</h1>
    <p class="mb-4">ご注文を受け付けました。</p>
    <p class="mb-4">
      ご感想やご意見がございましたら、ぜひ
      <a href="{{ url('/contact') }}" class="text-blue-500 hover:underline">
        お問い合わせフォーム
      </a>
      からお知らせください。
    </p>
    <a
      href="{{ route('order') }}"
      class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
    >
      注文一覧に戻る
    </a>
  </div>
@endsection
