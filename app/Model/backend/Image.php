<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'image_path',
        'publish'
    ];
}
