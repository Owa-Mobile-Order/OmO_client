<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class initUsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'email' => 'test@example.com',
      'password' => Hash::make('test'),
      'display_name' => 'Test User',
      'student_id' => 'TESTUSER',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
