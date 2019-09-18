<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\frontend\RegisterEmailController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('frontend.register');
    }


    public function test(Request $request)
    {
        $this->validator($request->all())->validate();
        return $request;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    protected function redirectTo()
    {
        // $success='註冊成功，請至信箱收取確認信';
        return route('login');
        // return route('register')->with('success');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
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
            'password_confirmation' => ['required_with:password', 'same:password'],
            'level' => ['required'],
            'active' => ['required']
        ], [
            'name.required'    => '請輸入使用者名稱。',
            'username.required'    => '請輸入帳號。',
            'email.email'    => '請輸入正確的信箱。',
            'email.required'    => '請輸入信箱。',
            'password.required' => '請輸入最少8碼的密碼。',
            'password.min:8' => '請輸入最少8碼的密碼。',
            'password_confirmation.same' => '兩次密碼不相同。',
            'password.confirmed' => '兩次密碼不相同。',
        ]);
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

    /**
     * 確認資料庫是否有重複註冊
     */
    
    private function confirm(Request $request)
    {
        $user_name    = User::where('name', $request->name)->first();
        $user_username= User::where('username', $request->username)->first();
        $user_email   = User::where('email', $request->email)->first();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if($user_name != null || $user_username != null || $user_email != null)
        {
            if ($user_name != null) {
                $errors = [ 'name' => '此使用者名稱已被使用過!'];
            };
    
            if ($user_username != null) {
                $errors = [ 'username' => '此帳號已被使用過!'];
            };
    
            if ($user_email != null) {
                $errors = [ 'email' => '此信箱已被註冊!'];
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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //create the random activasion code
        return $this->confirm($request);
        $activasion = md5(uniqid(rand(), true));
        $request['active'] = $activasion;

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        Session::put('success', '註冊成功，請至信箱收取確認信');
        Session::put('name', $request->name);
        Session::put('email', $request->email);
        $mail = new RegisterEmailController($activasion);
        $mail->send();

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
