<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Validation\Validator;
use App\EventService\Events\LoginEvent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('frontend.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        return route('admin.img');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->username() => 'required|string',
                'password' => 'required|string',
            ],
            [
                'username.required'    => '請輸入帳號。',
                'password.required' => '請輸入密碼。',
            ]
        );
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $active_user = User::where($this->username(), $request->username)
            ->where('active', 'active')->first();
        if ($active_user !== null) {

            return $this->guard()->attempt(
                $this->credentials($request),
                $request->filled('remember')
            );
        }

        return false;
    }

    // protected function attemptLogin(Request $request)
    // {
    //     //$active_user 找尋資料庫中是否有此帳號被啟動的資料
    //     $active_user = User::where($this->username(), $request->username)
    //         ->where('active', 'active')->first();
    //     if ($active_user !== null) {
    //         //若有資料，利用attempt方法去比對帳號密碼，若正確，laravel會將帳密資訊儲存在session,
    //         //第二個參數為布林值，若為trun，laravel會在資料庫的remeber_token紀錄。
    //         return $this->guard()->attempt(
    //             [
    //                 $this->username() => $request->username,
    //                 'password' => $request->password
    //             ],
    //             $request->remember
    //         );
    //     }
    //     //無此使用者資料直接回傳false
    //     return false;
    // }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // $errors = [$this->username() => trans('auth.failed')];
        $errors = [$this->username() => '請確認帳號密碼'];
        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 'active') {
            $errors = [$this->username() => '此帳號並未被啟動，若已完成註冊動作，請確認信箱!'];
        };
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        };
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        //$this裡面是否存在'hasTooManyLoginAttempts'方法，查詢帳號是否被鎖
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);
            //如果帳號被鎖就回傳被鎖的訊息
            return $this->sendLockoutResponse($request);
        }

        // $user = User::where($this->username(), $request->username)->first();
        // if (!empty($user)) {
        //     if ($user->active !== 'active') {
        //         $this->incrementLoginAttempts($request);
        //         return redirect()->route('login')->withErrors([
        //             'active' => '此帳號並未被啟動，若已完成註冊動作，請確認信箱!',
        //         ]);
        //     }
        // }

        if ($this->attemptLogin($request)) {
            //使用上面attemptLogin方法，若回傳true則導入後台
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.

        //若上面沒登入成功，則會增加登入失敗次數
        $this->incrementLoginAttempts($request);
        //並且導入登入頁面
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }
}
