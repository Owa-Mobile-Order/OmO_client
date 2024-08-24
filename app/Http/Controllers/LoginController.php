<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  protected string $redirectTo = '/home';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function index()
  {
    return view('login.login');
  }
}
