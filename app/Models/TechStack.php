<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TechStack extends Model
{
    protected $fillable = [
        'name',
        'icon', 
        'proficiency',
        'category'
    ];
    
    protected $casts = [
        'proficiency' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getIconUrlAttribute()
    {
        return $this->icon 
            ? Storage::url('tech-stacks/' . $this->icon)
            : null;
    }
}