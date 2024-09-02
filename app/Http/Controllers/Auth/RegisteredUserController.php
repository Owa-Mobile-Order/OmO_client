<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   */
  public function create(): View
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws ValidationException
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => ['required', 'string', 'max:16'],
      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        function ($attribute, $value, $fail) {
          if (DB::table('users')->where('email', $value)->exists()) {
            $fail('このメールアドレスは既に登録されています。');
          }
        },
      ],
      'g-recaptcha-response' => 'required|captcha',
      'student_code' => [
        'required',
        'string',
        'min:8',
        'max:8',
        function ($attribute, $value, $fail) {
          if (!DB::table('student_codes')->where('code', $value)->exists()) {
            $fail('無効な学生コードです。');
          }

          if (DB::table('users')->where('student_code', $value)->exists()) {
            $fail('この学生コードは既に使用されています。');
          }
        },
      ],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'avatar_path' => null,
      'student_code' => $request->student_code,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('order', absolute: false));
  }
}
