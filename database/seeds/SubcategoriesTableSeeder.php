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
            'name' => 'Sport',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Life')->pluck('id')->first()
        ],[
            'id' => 2,
            'name' => 'Cooking',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Life')->pluck('id')->first()
        ],[
            'id' => 3,
            'name' => 'Business',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Life')->pluck('id')->first()
        ],[
            'id' => 4,
            'name' => 'School',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Life')->pluck('id')->first()
        ],[
            'id' => 5,
            'name' => 'Sport nouns',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Nouns')->pluck('id')->first()
        ],[
            'id' => 6,
            'name' => 'Sport idioms',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Idioms')->pluck('id')->first()
        ],[
            'id' => 7,
            'name' => 'Sport adjectives',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Adjectives')->pluck('id')->first()
        ],
        ]);
    }
}
