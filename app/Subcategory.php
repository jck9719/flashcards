<?php

namespace flashcards;

use flashcards\Listeners\SubcategoryDeletingListener;
use Illuminate\Database\Eloquent\Model;
use flashcards\Category;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['name', 'description', 'category_id', 'id'];

    protected $dispatchesEvents = [
        'deleting' => SubcategoryDeletingListener::class
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function decks()
    {
        return $this->hasMany(Deck::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'permissions', 'subcategory_id', 'user_id');
    }
}
