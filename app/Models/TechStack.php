<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    use HasFactory;

    protected $table = 'tech_stacks';

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tech_stacks');
    }
}