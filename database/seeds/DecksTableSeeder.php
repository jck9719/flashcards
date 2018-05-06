<?php

use Illuminate\Database\Seeder;

class DecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonOne = json_encode([
            ['pl' => 'kopać', 'en' => 'kick'],
            ['pl' => 'bramkarz', 'en' => 'goalkeeper'],
            ['pl' => 'sędzia', 'en' => 'referee'],
            ['pl' => 'rożny', 'en' => 'corner'],
            ['pl' => 'piłka', 'en' => 'ball'],
        ]);

        $jsonTwo = json_encode([
            ['pl' => 'sędzia', 'es' => 'arbitro'],
            ['pl' => 'piłka', 'es' => 'pelota'],
            ['pl' => 'bramkarz', 'es' => 'portero'],
            ['pl' => 'rożny', 'es' => 'corner'],
        ]);

        $jsonThree = json_encode([
            ['en' => 'referee', 'es' => 'arbitro'],
            ['en' => 'ball', 'es' => 'pelota'],
            ['en' => 'goalkeeper', 'es' => 'portero'],
            ['en' => 'corner', 'es' => 'corner'],
        ]);

        DB::table('decks')->insert([[
            'name' => 'Football',
            'words' => $jsonTwo,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Sport')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'apanekEd')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polish')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'Spanish')->pluck('id')->first(),
            'public' => true
        ],[
            'name' => 'Football',
            'words' => $jsonOne,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Sport')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'apanekEd')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polish')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],[
            'name' => 'Football',
            'words' => $jsonThree,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Sport')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'apanekSupEd')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'Spanish')->pluck('id')->first(),
            'public' => true
        ],[
            'name' => 'Football idioms',
            'words' => $jsonOne,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Sport idioms')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'apanekAdmin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polish')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => false
        ],
        ]);
    }
}
