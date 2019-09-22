<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Model\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function showResetForm(Request $request, $reset_token = null)
    {
        $user = User::where('reset_token', $reset_token)->first();
        // return($user);
        if (!is_null($user)) {
            return view('frontend.reset')->with(
                ['token' => $reset_token, 'email' => $request->email]
            );;
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())
            ->with('status', "密碼以重設完畢，您可進行登入動作");
    }


    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['password' => "密碼不得與先前密碼重複"]);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        if($user["password"] != $password)
        {
            $user->password = $password;
            $user->reset_token='have reseted';
    
            // $user->setRememberToken(Str::random(60));
    
            $user->save();
            return true;
    
            // event(new PasswordReset($user));
    
            // $this->guard()->login($user);
        }
        else{
            return false;
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        // $request->validate($this->rules(), $this->validationErrorMessages());
        // return $request;
        $this->validator($request->all())->validate();
        $user=User::where('email', $request->email)->where('reset_token', $request->token)->first();
        // return $request;


        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->resetPassword(
            $user,
            bcrypt($request->password)
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['same:password'],
            'token' => 'required',
        ], [
            'email.email'    => '請經由正確管道重設密碼。',
            'email.required'    => '請經由正確管道重設密碼。',
            'password.required' => '請輸入最少8碼的密碼。',
            'password.min' => '請輸入最少8碼的密碼。',
            'password_confirmation.same' => '兩次密碼不相同。',
            'password.confirmed' => '兩次密碼不相同。',
            'token.required' => '請經由正確管道重設密碼。',

        ]);
    }
}
