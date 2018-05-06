<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([[
            'id' => 1,
            'name' => 'Polish',
            'code' => 'pl'
        ], [
            'id' => 2,
            'name' => 'English',
            'code' => 'en'
        ], [
            'id' => 3,
            'name' => 'Spanish',
            'code' => 'es'
        ], [
            'id' => 4,
            'name' => 'French',
            'code' => 'fr'
        ]
        ]);
    }
}
