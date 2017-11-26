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
        //
         User::create([
            'name' => 'Quản trị trang web',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'lv' => 1
        ]);
    }
}
