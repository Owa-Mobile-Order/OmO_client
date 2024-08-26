<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
  }

  public function index()
  {
    // データベースからデータを取得
    $menuItems = $this->getMenuItems();

    // 表示に必要な値を渡す
    return view('list', [
      'items' => $menuItems,
    ]);
  }

  public function detail($id = null)
  {
    $item = $this->getMenuItems($id);

    return view('detail', [
      'item' => $item,
    ]);
  }

  // メニューを取得
  private function getMenuItems($id = null)
  {
    if ($id) {
      return DB::table('menu_items')->where('id', $id)->first();
    }

    return DB::table('menu_items')->orderBy('name', 'asc')->get();
  }
}
