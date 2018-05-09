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
            'name' => 'Nouns',
            'description' => 'Rzeczowniki.',
            
        ],[
            'id' => 2,
            'name' => 'Adjectives',
            'description' => 'Przymiotniki.',
        ],[
            'id' => 3,
            'name' => 'Verbs',
            'description' => 'Czasowniki.',
        ]
        ]);
    }
}
