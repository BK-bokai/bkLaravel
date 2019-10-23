<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\student_skills;
use App\Model\student;
use App\Model\work_skills;
use App\Model\worker;
use App\Model\Index;
use App\Model\Image;




class IndexController extends Controller
{
    function index()
    {
        $index=Index::all()[0];
        $student=student::all()[0];
        $student_skills=student_skills::all();
        $worker=worker::all()[0];
        $work_skills=work_skills::all();
        $image = Image::where('index',1)->first();
        $image = explode("\\", $image->image_path);
        $image = end($image);
        return view('frontend/index',compact('index','student','student_skills','worker','work_skills','image'));
    }
}
