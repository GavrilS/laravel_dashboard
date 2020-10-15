<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLinks extends Model
{
    use HasFactory;
    protected $table = 'user_links';
    protected $casts = [
        'links' => 'array',
        'colors' => 'array',
        'titles' => 'array'
    ];
}
