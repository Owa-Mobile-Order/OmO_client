<?php

namespace App\Http\Controllers;

use App\Models\Orders;

class DashboardController extends Controller
{
  public function dashboard()
  {
    $orders = Orders::all();
    return view('dashboard.dashboard', ['orders' => $orders]);
  }
}
