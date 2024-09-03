<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  use CrudTrait;
  use HasFactory;

  protected $table = 'orders';
  protected $guarded = ['id'];

  public function menuItem()
  {
    return $this->belongsTo(MenuItem::class, 'menu_id');
  }
}
