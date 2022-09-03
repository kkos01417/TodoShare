<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    \App\Models\User::create([
      'name' => 'オーナー太郎',
      'email' => 'owner@example.com',
      'password' => bcrypt('xxxxxxxx'),
      'role' => 'owner'
    ]);

    \App\Models\User::create([
      'name' => 'お客花子',
      'email' => 'customer@example.com',
      'password' => bcrypt('xxxxxxxx'),
      'role' => 'customer'
    ]);
  }
}
