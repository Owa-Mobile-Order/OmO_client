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

  protected $fillable = [
    'email',
    'name',
    'password',
    'name',
    'student_code',
    'is_admin',
  ];
}
