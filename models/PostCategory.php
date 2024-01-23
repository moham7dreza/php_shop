<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'status',
    ];
}