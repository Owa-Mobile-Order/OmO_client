<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use CrudTrait;
  use HasFactory, Notifiable;

  protected $table = 'users';
  protected $guarded = ['id'];

  protected $fillable = [
    'email',
    'name',
    'password',
    'name',
    'student_code',
    'is_admin',
  ];

  public function orders()
  {
    return $this->hasMany(Orders::class, 'user_id');
  }
}
