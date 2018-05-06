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
                'name' => 'apanekAdmin',
                'email' => 'arekpn@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => DB::table('roles')->where('name', 'admin')->pluck('id')->first()
            ],
            [
                'name' => 'apanekSupEd',
                'email' => 'arekpnsuped@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => DB::table('roles')->where('name', 'supereditor')->pluck('id')->first()
            ],
            [
                'name' => 'apanekEd',
                'email' => 'arekpned@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => DB::table('roles')->where('name', 'editor')->pluck('id')->first()
            ],
            [
                'name' => 'apanekUser',
                'email' => 'arekpnuser@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => DB::table('roles')->where('name', 'user')->pluck('id')->first()
            ]
        ]);
    }
}
