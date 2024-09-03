<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $table = 'menu_items';
  protected $guarded = ['id'];

  public function orders()
  {
    return $this->hasMany(Orders::class, 'menu_id');
  }
}
