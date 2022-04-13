<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'url',
        'img',
        'content',
        'category_id',
        'user_id',
        'private',
    ];
}
