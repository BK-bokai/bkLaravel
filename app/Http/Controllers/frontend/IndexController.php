<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\student_skills;
use App\Model\student;
use App\Model\work_skills;
use App\Model\worker;
use App\Model\Index;




class IndexController extends Controller
{
    function index()
    {
        $index=Index::all()[0];
        $student=student::all()[0];
        $student_skills=student_skills::all();
        $worker=worker::all()[0];
        // return $worker[0];
        $work_skills=work_skills::all();
        return view('frontend/index',compact('index','student','student_skills','worker','work_skills'));
    }
}
