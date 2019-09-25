<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Image;

class ImgController extends Controller
{
    function index()
    {
        $images=Image::all();
        return view('frontend/images',compact('images'));
    }
}
