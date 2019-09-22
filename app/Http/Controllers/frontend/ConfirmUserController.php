<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\User;
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
            $user->active='active';
            $user->save();

            return view('frontend.ConfirmUser');
        } else {
            return redirect()->route('login');
        }
    }
}
