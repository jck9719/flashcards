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
            'description' => 'Adminstrator, zarządzanie wszystkim.'
        ],[
            'id' => 2,
            'name' => 'supereditor',
            'description' => 'Edycja wszystkich zestawów słówek.'
        ],[
            'id' => 3,
            'name' => 'editor',
            'description' => 'Edycja wybranego zestawu słówek.'
        ],[
            'id' => 4,
            'name' => 'user',
            'description' => 'Wgląd w rezultalty i tworzenie prywatnych zestawów słówek.'
        ]
        ]);
    }
}
