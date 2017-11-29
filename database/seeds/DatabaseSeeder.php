<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Quản trị',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Cường',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Hằng',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Huyền',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Sơn',
            'email' => 'user4@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Đinh',
            'email' => 'user5@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Khoa',
            'email' => 'user6@gmail.com',
            'password' => Hash::make('111111'),
            'lv' => 0,
        ]);
    }
}
