<?php

namespace flashcards;

use Illuminate\Database\Eloquent\Model;
use flashcards\Deck;

class Language extends Model
{
    public function decks()
    {
        return $this->hasMany(Deck::class);
    }
}
