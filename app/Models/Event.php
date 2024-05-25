<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

protected $table = 'events';

    protected $fillable = [
        'name',
        'category',
        'date_event',
        'places_available',
        'description',
        'image',
        'is_active'
    ];
}
