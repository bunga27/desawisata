<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
              'email'  => 'admin@gmail.com',
              'password' => bcrypt('admin'),
              'name'  => 'Admin',
              'level'  => 'super',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
               ],
            ]);
    }
}
