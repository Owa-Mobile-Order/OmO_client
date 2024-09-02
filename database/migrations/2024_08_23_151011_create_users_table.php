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
    Schema::create('users', function (Blueprint $table) {
      $table->id();

      $table->string('email', 255);
      $table->string('password', 60);
      $table->string('name', 32);
      $table->text('avatar_path')->nullable();
      $table->string('student_code', 8);
      $table->tinyInteger('is_admin')->default(0);

      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
