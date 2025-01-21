<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'name',
        'bio',
        'position',
        'photo',
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array'
    ];
}