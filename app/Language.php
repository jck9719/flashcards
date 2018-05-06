<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Deck;

class Language extends Model
{
    public function decks()
    {
        return $this->hasMany(Deck::class);
    }
}
