<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'event_date',
        'photo',
        'location',
        'event_category_id',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
