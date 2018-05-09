<?php

namespace flashcards;

use Illuminate\Database\Eloquent\Model;
use flashcards\Listeners\CategoryDeletingListener;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'id'];

    protected $dispatchesEvents = [
        'deleting' => CategoryDeletingListener::class
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
