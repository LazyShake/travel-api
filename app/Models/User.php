<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'login',
        'password',
        'role', // admin или user
    ];

    protected $hidden = [
        'password',
    ];

    public function places()
    {
        return $this->belongsToMany(Place::class, 'user_places')->withTimestamps();
    }
}
