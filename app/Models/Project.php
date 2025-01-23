<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'github_link',
        'live_link',
    ];

    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'project_tech_stacks');
    }
}
