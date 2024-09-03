<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\MenuItem;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $menuItems = $this->getMenuItems();

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

  public function orders()
  {
    $orders = $this->getOrders();

    return view('dashboard.dashboard', [
      'orders' => $orders,
    ]);
  }

  public function order($id = null)
  {
    $order = $this->getOrders($id);

    return view('dashboard.detail', [
      'order' => $order,
    ]);
  }

  public function submit(Request $request)
  {
    $userId = $request->user()->id;

    $orderData = [
      'user_id' => $userId,
      'status' => 'pending',
      'menu_id' => $request->input('item_id'),
      'created_at' => now(),
      'updated_at' => now(),
    ];

    $orderId = Orders::create($orderData)->id;

    event(new OrderCreated(Orders::with(['menuItem', 'user'])->find($orderId)));

    $request->session()->put('order_completed', true);
    return redirect('/thanks');
  }

  public function update(Request $request, $id)
  {
    $order = Orders::find($id);

    if (!$order) {
      return redirect()->back()->with('error', 'Order not found.');
    }

    $status = $request->input('status');

    switch ($status) {
      case 'cancelled':
        $order->delete();
        return redirect('/dashboard')->with(
          'success',
          'Order cancelled and deleted.'
        );
      case 'pending':
        $order->status = 'pending';
        break;
      case 'completed':
        $order->status = 'confirmed';
        break;
      default:
        return redirect()->back()->with('error', 'Invalid status.');
    }

    $order->save();
    return redirect('/dashboard')->with('success', 'Order status updated.');
  }

  private function getMenuItems($id = null)
  {
    if ($id) {
      return MenuItem::find($id);
    }

    return MenuItem::orderBy('name', 'asc')->get();
  }

  private function getOrders($id = null)
  {
    if ($id) {
      return Orders::with(['menuItem', 'user'])->find($id);
    }

    return Orders::with(['menuItem', 'user'])
      ->where('status', 'pending')
      ->orderBy('created_at', 'desc')
      ->get()
      ->toArray();
  }
}
