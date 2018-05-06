<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Listeners\CategoryDeletingListener;

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
