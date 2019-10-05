<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Model\User;


class MemberController extends Controller
{
    public function index()
    {
        $members = User::All();
        $name = Auth::user()->name;
        return view('backend/member',compact('name','members'));
    }

    public function showform()
    {
        $members = User::All();
        $name = Auth::user()->name;
        return view('backend/addmember',compact('name','members'));
    }
}
