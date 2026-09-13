<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'image', 'technologies', 'github_link', 'live_link'];

    protected $casts = [
        'technologies' => 'array',
    ];
}
