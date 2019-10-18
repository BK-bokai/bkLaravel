<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Index;
use App\Model\student_skills;
use App\Model\student;
use App\Model\work_skills;
use App\Model\worker;
use Illuminate\Support\Facades\Validator;
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


        $index->content_one=$request->index_content_one;
        $index->content_two=$request->index_content_two;
        $index->save();
        $student->content  =$request->student_content;
        $student->save();
        $worker->content   =$request->worker_content;
        $worker->save();

        return $request->index_content_two;
    }

    function add_student_skill(Request $request)
    {   
        Validator::make($request->all(), [
            'student_skill' => ['required', 'string', 'max:255'],
        ], [
            'student_skill.required'    => '請輸入技能名稱。',
        ])->validate();

        return $request;
    }


    function del_student_skill(Request $request,student_skills $student_skill)
    {
        $student_skill->delete();
        return ['finish'];
    }

    function add_work_skill(Request $request)
    {
        Validator::make($request->all(), [
            'work_skill' => ['required', 'string', 'max:255'],
        ], [
            'work_skill.required'    => '請輸入技能名稱。',
        ])->validate();    
        return $request;
    }


    function del_work_skill(Request $request,work_skills $work_skill)
    {   
        $work_skill->delete();
        return ['finish'];
    }


}
