<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    public function index()
    {
        $members = User::All();
        $name = Auth::user()->name;
        return view('backend/member', compact('name', 'members'));
    }

    public function showform()
    {
        $members = User::All();
        $name = Auth::user()->name;
        return view('backend/addmember', compact('name', 'members'));
    }

    public function showMember(User $user)
    {
        // $members = User::All();
        $name = Auth::user()->name;
        return view('backend/editmember', compact('name', 'user'));
    }

    public function editMember(Request $request, User $user)
    {
        $this->edit_validator($request->all())->validate();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('admin.memberAdmin');
    }


    public function addUser(Request $request)
    {
        $user_name    = User::where('name', $request->name)->first();
        $user_username = User::where('username', $request->username)->first();
        $user_email   = User::where('email', $request->email)->first();
        //create the random activasion code
        if ($user_name != null || $user_username != null || $user_email != null) {
            return $this->confirm($request);
        }

        // $activasion = md5(uniqid(rand(), true));
        $request['active'] = 'active';

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        return redirect()->route('admin.addmember')
            ->with('status', '已新增一位會員');
    }

    public function deleteUser(Request $request, User $user)
    {
        $user->delete();
        return [
            'contain' => '已刪除用戶',
            $user
        ];
    }



    public function check(Request $request, User $user)
    {
        $check=[];
        $users_name = User::where('id', '!=', $user->id)
            ->where('name', '=', $request->name)->get();
        $users_username = User::where('id', '!=', $user->id)
            ->where('username', '=', $request->username)->get();
        $users_email = User::where('id', '!=', $user->id)
            ->where('email', '=', $request->email)->get();

        if(count($users_name)==0 && count($users_username)==0 && count($users_email)==0)
        {
            $check['repeat'] = 0;
        }
        else
        {
            $check['repeat'] = 1;
            $check['repeat_name']= (count($users_name) > 0)? 1:0;
            $check['repeat_username']= (count($users_username) > 0)? 1:0;
            $check['repeat_email']= (count($users_email) > 0)? 1:0;
            

        }

        if( $request->name != $user->name || 
            $request->username != $user->username ||
            $request->email != $user->email ||
            $request->level != $user->level)
        {
                $check['change'] = 1;
        }
        else
        {
            $check['change'] = 0;
        }
        
        // return ['repeat' => count($users), 'change' => $oldname];
        return $check;
    }


    /**
     * 確認輸入的資料
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['same:password'],
            'level' => ['required'],
            'active' => ['required']
        ], [
            'name.required'    => '請輸入使用者名稱。',
            'username.required'    => '請輸入帳號。',
            'email.email'    => '請輸入正確的信箱。',
            'email.required'    => '請輸入信箱。',
            'password.required' => '請輸入最少8碼的密碼。',
            'password.min' => '請輸入最少8碼的密碼。',
            'password_confirmation.same' => '兩次密碼不相同。',
            'password.confirmed' => '兩次密碼不相同。',
        ]);
    }

        /**
     * 確認輸入的資料
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function edit_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'level' => ['required'],
        ], [
            'name.required'    => '請輸入使用者名稱。',
            'username.required'    => '請輸入帳號。',
            'email.email'    => '請輸入正確的信箱。',
            'email.required'    => '請輸入信箱。',
        ]);
    }


    /**
     * 確認資料庫是否有重複註冊
     */

    private function confirm(Request $request)
    {
        $user_name    = User::where('name', $request->name)->first();
        $user_username = User::where('username', $request->username)->first();
        $user_email   = User::where('email', $request->email)->first();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user_name != null || $user_username != null || $user_email != null) {
            if ($user_name != null) {
                $errors = ['name' => '此使用者名稱已被使用過!'];
            };

            if ($user_username != null) {
                $errors = ['username' => '此帳號已被使用過!'];
            };

            if ($user_email != null) {
                $errors = ['email' => '此信箱已被註冊!'];
            };

            if ($user_name != null && $user_username != null) {
                $errors = ['name' => '此使用者名稱已被使用過!', 'username' => '此帳號已被使用過!'];
            };

            if ($user_name != null && $user_email != null) {
                $errors = ['name' => '此使用者名稱已被使用過!', 'email' => '此信箱已被註冊!'];
            };

            if ($user_username != null && $user_email != null) {
                $errors = ['username' => '此帳號已被使用過!', 'email' => '此信箱已被註冊!'];
            };

            if ($user_name != null && $user_username != null && $user_email != null) {
                $errors = ['name' => '此使用者名稱已被使用過!', 'username' => '此帳號已被使用過!', 'email' => '此信箱已被註冊!'];
            };

            return redirect()->back()
                ->withInput($request->only('username', 'remember'))
                ->withErrors($errors);
        };


        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        };

        return false;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => $data['active'],
            'level' => $data['level']
        ]);
    }
}
