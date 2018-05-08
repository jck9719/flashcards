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
            'name' => 'Ogólne',
            'description' => 'Wyrazy dotyczące życia codziennego.',
            
        ],[
            'id' => 2,
            'name' => 'Specjalistyczne',
            'description' => 'Wyrazy dotyczącę konkretnych specjalizacji.',
        ]
        ]);
    }
}
