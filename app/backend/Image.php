<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'image_path',
        'publish'
    ];
}
