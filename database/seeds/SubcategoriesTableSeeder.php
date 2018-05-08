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
            'name' => 'Dom',
            'description' => 'Kategoria zawierające słówka z działu dom.',
            'category_id' => DB::table('categories')->where('name', 'Ogólne')->pluck('id')->first()
        ],[
            'id' => 2,
            'name' => 'Rodzina',
            'description' => 'Kategoria zawierająca słówka z działu praca',
            'category_id' => DB::table('categories')->where('name', 'Ogólne')->pluck('id')->first()
        ],[
            'id' => 3,
            'name' => 'Informatyka',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Specjalistyczne')->pluck('id')->first()
        ],[
            'id' => 4,
            'name' => 'Medycyna',
            'description' => 'Lorem ipsum dolor sit amet',
            'category_id' => DB::table('categories')->where('name', 'Specjalistyczne')->pluck('id')->first()
        ]
        ]);
    }
}
