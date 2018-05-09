<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([[
            'id' => 1,
            'name' => 'Człowiek',
            'description' => 'Rzeczowniki z kategorii człowiek.',
            'category_id' => DB::table('categories')->where('name', 'Nouns')->pluck('id')->first()
        ],[
            'id' => 2,
            'name' => 'Wygląd',
            'description' => 'Przymiotniki z kategorii wygląd.',
            'category_id' => DB::table('categories')->where('name', 'Adjectives')->pluck('id')->first()
        ],[
            'id' => 3,
            'name' => 'Prace',
            'description' => 'Czasowniki z kategorii prace domowe.',
            'category_id' => DB::table('categories')->where('name', 'Verbs')->pluck('id')->first()
        ]
        ]);
    }
}
