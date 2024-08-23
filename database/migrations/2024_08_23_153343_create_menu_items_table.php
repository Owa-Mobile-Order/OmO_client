<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('menu_items', function (Blueprint $table) {
      $table->id();

      $table->bigInteger('category_id')->unsigned();
      $table->string('name', 16);
      $table->text('description');
      $table->smallInteger('price');
      $table->text('image_path');
      $table->boolean('is_available');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menu_items');
  }
};
