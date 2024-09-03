<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
  public function sendToDiscord(Request $request)
  {
    // バリデーション
    $request->validate([
      'name' => 'required|string',
      'student_code' => 'required|string',
      'title' => 'required|string',
      'description' => 'required|string',
    ]);

    $webhookUrl = env('DISCORD_WEBHOOK_URL');

    $data = [
      'content' =>
        "お問い合わせフォームからの入力を受け取りました:\n\n" .
        "**Name:** `{$request->input('name')}`\n" .
        "**Student Code:** `{$request->input('student_code')}`\n" .
        "**Title:** `{$request->input('title')}`\n" .
        "**Description:** ```\n{$request->input('description')}\n```",
    ];

    Http::post($webhookUrl, $data);

    return redirect('/contact/thanks');
  }
}
