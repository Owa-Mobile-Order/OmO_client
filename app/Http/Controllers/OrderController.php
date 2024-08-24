<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function __construct()
  {
    // $this->middleware('auth');
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

  // メニューを取得
  private function getMenuItems()
  {
    return DB::table('menu_items')->get();
  }
}
