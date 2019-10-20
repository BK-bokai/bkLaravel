<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Index;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'image_path',
        'publish'
    ];
}
