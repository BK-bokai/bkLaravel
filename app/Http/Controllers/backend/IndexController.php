<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Index;
use App\Model\student_skills;
use App\Model\student;
use App\Model\work_skills;
use App\Model\worker;
use Auth;


class IndexController extends Controller
{
    function index()
    {
        $index=Index::all()[0];
        $student=student::all()[0];
        $student_skills=student_skills::all();
        $worker=worker::all()[0];
        $name = Auth::user()->name;

        $work_skills=work_skills::all();
        return view('backend/index',compact('index','student','student_skills','worker','work_skills','name'));
    }

    function edit(Request $request,Index $index,student $student,worker $worker)
    {

        $index_content_one = $request->index_content_one;
        $index_content_two = $request->index_content_two;
        $student_content   = $request->student_content;
        $worker_content    = $request->worker_content;

        $index->content_one=$request->index_content_one;
        $index->content_two=$request->index_content_two;
        $index->save();
        $student->content  =$request->student_content;
        $student->save();
        $worker->content   =$request->worker_content;
        $worker->save();

        return $request->index_content_two;
    }
}
