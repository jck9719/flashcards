<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'user_id' => DB::table('users')->where('name', 'editor')->pluck('id')->first(),
                'subcategory_id' => 1
            ],[
                'user_id' => DB::table('users')->where('name', 'supereditor')->pluck('id')->first(),
                'subcategory_id' => 2
            ],[
                'user_id' => DB::table('users')->where('name', 'supereditor')->pluck('id')->first(),
                'subcategory_id' => 3
            ]
        ]);
    }
}
