<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\backend\Image;

class ConfirmUserController extends Controller
{
    public function confirm($active)
    {
        $user = User::where('active', $active)->orderBy('id', 'desc')->take(1)->get();

        // return $user[0]['id'];
        // return view('frontend.ConfirmUser');
        if (!empty( $user->all())) {
            $id=$user[0]['id'];
            $user = User::find($id);
            $user->active='yse';
            $user->save();

            return view('frontend.ConfirmUser');
        } else {
            return redirect()->route('login');
        }
    }
}
