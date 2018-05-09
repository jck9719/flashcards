<?php

namespace flashcards;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'permissions', 'user_id', 'subcategory_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
