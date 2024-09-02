<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\OrderSubmitted;
use function Laravel\Prompts\alert;

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
    return view('order.list', [
      'items' => $menuItems,
    ]);
  }

  public function detail($id = null)
  {
    $item = $this->getMenuItems($id);

    return view('order.detail', [
      'item' => $item,
    ]);
  }

  public function submit(Request $request)
  {
    $userId = $request->user()->id;

    $orderData = [
      'user_id' => $userId,
      'status' => 'pending',
      'created_at' => now(),
      'updated_at' => now(),
    ];

    $orderId = DB::table('orders')->insertGetId($orderData);

    $order = DB::table('orders')->where('id', $orderId)->first();

    event(new OrderSubmitted($order));

    $request->session()->put('order_completed', true);
    return redirect('/thanks');
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
