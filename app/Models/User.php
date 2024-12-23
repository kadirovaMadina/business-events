<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'role',
        'phone',
        'photo',
        'email',
        'telegram',
        'instagram',
        'facebook',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }
}
