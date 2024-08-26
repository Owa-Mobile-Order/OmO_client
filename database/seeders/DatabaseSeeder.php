<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'email' => 'test@example.com',
      'password' => Hash::make('test'),
      'remember_token' => null,
      'name' => 'Test User',
      'avatar_path' => 'https://cdn.discordapp.com/attachments/1149350818747781122/1277555246650097674/quote.jpg?ex=66cd978a&is=66cc460a&hm=5578f04344e356d80dedc71c8aa9f061b465329c1074f7f6852615deab00426a&',
      'student_id' => 'TESTUSER',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
