<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nenga extends Model
{
    protected $fillable = [
        'content', 'author', 'image_url',
    ];
}
