<?php

namespace flashcards;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['user_id', 'subcategory_id'];
}
