<?php

namespace flashcards;

use flashcards\Listeners\DeckDeletingListener;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = ['name', 'words', 'public'];

    protected $dispatchesEvents = [
        'deleting' => DeckDeletingListener::class
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function language1()
    {
        return $this->belongsTo(Language::class, 'language1_id');
    }

    public function language2()
    {
        return $this->belongsTo(Language::class, 'language2_id');
    }
}
