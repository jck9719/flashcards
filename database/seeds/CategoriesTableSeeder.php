<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'Life',
            'description' => 'Lorem ipsum dolor sit amet',
            
        ],[
            'id' => 2,
            'name' => 'Nouns',
            'description' => 'Lorem ipsum dolor sit amet',
        ],[
            'id' => 3,
            'name' => 'Idioms',
            'description' => 'Lorem ipsum dolor sit amet',
        ],[
            'id' => 4,
            'name' => 'Adjectives',
            'description' => 'Lorem ipsum dolor sit amet',
        ]
        ]);
    }
}
