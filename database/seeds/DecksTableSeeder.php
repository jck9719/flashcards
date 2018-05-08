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
        $jsonHouse = json_encode([
            ['pl' => 'dom', 'en' => 'house'],
            ['pl' => 'drzwi', 'en' => 'door'],
            ['pl' => 'pokój', 'en' => 'room'],
            ['pl' => 'półka', 'en' => 'shelf'],
            ['pl' => 'kuchnia', 'en' => 'kitchen'],
        ]);

        $jsonFamily = json_encode([
            ['pl' => 'rodzina', 'en' => 'family'],
            ['pl' => 'syn', 'en' => 'son'],
            ['pl' => 'wujek', 'en' => 'uncle'],
            ['pl' => 'ciotka', 'en' => 'aunt'],
            ['pl' => 'babcia', 'en' => 'grandmother'],
        ]);

        $jsonInformatic = json_encode([
            ['pl' => 'rdzeń', 'en' => 'core'],
            ['pl' => 'komputer', 'en' => 'computer'],
            ['pl' => 'klawiatura', 'en' => 'keyboard'],
            ['pl' => 'oprogramowane', 'en' => 'software'],
            ['pl' => 'słuchawki', 'en' => 'headphones'],
        ]);

        $jsonMedic = json_encode([
            ['pl' => 'lekarz', 'en' => 'doktor'],
            ['pl' => 'pielęgniarka', 'en' => 'nurse'],
            ['pl' => 'kostnica', 'en' => 'morgue'],
            ['pl' => 'szpital', 'en' => 'hospital'],
            ['pl' => 'strzykawka', 'en' => 'syringe'],
        ]);

        DB::table('decks')->insert([
        [
            'name' => 'House',
            'words' => $jsonHouse,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Dom')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'Family',
            'words' => $jsonFamily,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Rodzina')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'House',
            'words' => $jsonInformatic,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Informatyka')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'House',
            'words' => $jsonOne,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Dom')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ],
        [
            'name' => 'House',
            'words' => $jsonMedic,
            'subcategory_id' => DB::table('subcategories')->where('name', 'Medyczne')->pluck('id')->first(),
            'user_id' => DB::table('users')->where('name', 'admin')->pluck('id')->first(),
            'language1_id' => DB::table('languages')->where('name', 'Polski')->pluck('id')->first(),
            'language2_id' => DB::table('languages')->where('name', 'English')->pluck('id')->first(),
            'public' => true
        ]
        ]);
    }
}
