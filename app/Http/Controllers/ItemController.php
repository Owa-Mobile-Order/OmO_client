<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
  public function index()
  {
    // JSONデータ受け取り
    // $json_items = file_get_contents("/api/items");

    $json_items = [
      [
        'name' => '醤油ラーメン',
        'id' => '1',
        'category' => 'noodles',
      ],
      [
        'name' => '味噌ラーメン',
        'id' => '2',
        'category' => 'noodles',
      ],
      [
        'name' => '牛丼',
        'id' => '3',
        'category' => 'donburi',
      ],
    ];

    // 表示に必要な値を渡す
    return view('list', [
      'items' => $json_items,
    ]);
  }

  public function detail($id)
  {
    return view('detail', [
      'name' => '醤油ラーメン',
      'id' => 'syoyu_ramen',
    ]);
  }

  private function getJson($id = null)
  {
    // $idがあれば
    // SELECT * FROM items WHERE id = $id;

    // $idがなかったら
    // SELECT * FROM items;
  }
}
