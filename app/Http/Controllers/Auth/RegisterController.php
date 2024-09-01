<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
  use RegistersUsers;

  protected $redirectTo = '/order';

  public function __construct()
  {
    $this->middleware('guest');
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
      'student_code' => $data['student_code'],
      'password' => Hash::make($data['password']),
    ]);
  }
}
