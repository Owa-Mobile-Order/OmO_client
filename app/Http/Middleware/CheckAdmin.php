<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    // ユーザーが認証されていない場合や、is_adminが0の場合
    if (!Auth::check() || Auth::user()->is_admin == 0) {
      // 403 Forbiddenレスポンスを返す
      abort(403, 'Unauthorized action.');
    }

    return $next($request);
  }
}
