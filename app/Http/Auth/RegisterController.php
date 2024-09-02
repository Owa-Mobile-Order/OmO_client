<?php

namespace App\Http\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  use RegistersUsers;

  protected $redirectTo = '/order';

  //  public function __construct()
  //  {
  //    $this->middleware('guest');
  //  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'g-recaptcha-response' => 'required|captcha',
      'student_code' => [
        'required',
        'string',
        'min:8',
        'max:8',
        'unique:users',
        function ($attribute, $value, $fail) {
          $sql = "SELECT * FROM `student_codes` WHERE `code` = $value";
          $result = DB::select($sql);
          if (empty($result)) {
            $fail('その学籍番号は登録されていません');
          }
        },
      ],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
  }

  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'student_code' => $data['student_code'],
    ]);
  }
}
