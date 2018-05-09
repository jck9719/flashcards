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
        $jsonHuman = json_encode([
            ['pl' => 'człowiek', 'en' => 'human'],
            ['pl' => 'ręka', 'en' => 'hand'],
            ['pl' => 'wątroba', 'en' => 'liver'],
            ['pl' => 'serce', 'en' => 'heart'],
            ['pl' => 'oko', 'en' => 'eye'],
        ]);

        $jsonLook = json_encode([
            ['pl' => 'piękna', 'en' => 'beautiful'],
            ['pl' => 'długowłosa', 'en' => 'long-haired'],
            ['pl' => 'przystojny', 'en' => 'handsome'],
            ['pl' => 'opalony', 'en' => 'tanned'],
            ['pl' => 'łysy', 'en' => 'bald'],
        ]);

        $jsonHomeworks = json_encode([
            ['pl' => 'odkurzać', 'en' => 'vacuum'],
            ['pl' => 'gotować', 'en' => 'cook'],
            ['pl' => 'sprzątać', 'en' => 'clean up'],
            ['pl' => 'prasować', 'en' => 'iron'],
            ['pl' => 'zmywać', 'en' => 'wash'],
        ]);


        DB::table('decks')->insert([
        [
            'name' => 'Części ciała',
            'words' => $jsonHuman,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Człowiek')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'Wygląd',
            'words' => $jsonLook,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Wygląd')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'Prace domowe',
            'words' => $jsonHomeworks,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Prace')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ]
        ]);
    }
}
