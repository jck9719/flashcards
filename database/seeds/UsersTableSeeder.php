<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'gaunt1111@gmail.com',
                'password' => bcrypt('admin'),
                'role_id' => DB::table('roles')->where('name', 'admin')->pluck('id')->first()
            ],
            [
                'name' => 'supereditor',
                'email' => 'se@gmail.com',
                'password' => bcrypt('se'),
                'role_id' => DB::table('roles')->where('name', 'supereditor')->pluck('id')->first()
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('editor'),
                'role_id' => DB::table('roles')->where('name', 'editor')->pluck('id')->first()
            ],
            [
                'name' => 'doe',
                'email' => 'doe@gmail.com',
                'password' => bcrypt('doe'),
                'role_id' => DB::table('roles')->where('name', 'user')->pluck('id')->first()
            ]
        ]);
    }
}
