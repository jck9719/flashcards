<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'id' => 1,
            'name' => 'admin',
            'description' => 'All permissions'
        ],[
            'id' => 2,
            'name' => 'supereditor',
            'description' => 'Can edit all decks'
        ],[
            'id' => 3,
            'name' => 'editor',
            'description' => 'Can edit given decks'
        ],[
            'id' => 4,
            'name' => 'user',
            'description' => 'Default, no special permissions'
        ]
        ]);
    }
}
