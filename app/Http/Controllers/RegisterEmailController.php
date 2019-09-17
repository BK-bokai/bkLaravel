<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 記得使用 use
use Illuminate\Support\Facades\Mail;
use App\Mail\register;
use Illuminate\Support\Facades\Session;

class RegisterEmailController extends Controller
{
    public function send()
    {
        /**
         * 方法1
         */
        // 收件者務必使用 collect 指定二維陣列，每個項目務必包含 "name", "email"
        $to = collect([
            ['name' => Session::get('name'), 'email' => Session::get('email')]
        ]);

        // 提供給模板的參數
        $MailBody = [
            'content' => "您已於BK網站註冊成功，請點選下列網址進行進一步認證",
            'link'    => "testtest"
        ];

        // 若要直接檢視模板
        // echo (new Warning($data))->render();die;

        Mail::to($to)->send(new register($MailBody));

        /**
         * 方法2
         */
        // Mail::raw('測試使用 Laravel 5 的 Gmail 寄信服務', function ($message) {
        //     $message->to('bokai830124@gmail.com');
        // });

        /**
         * 方法3
         */
        //從表單取得資料
        // $from = [
        //     'email' => env('MAIL_FROM_ADDRESS'),
        //     'name' => env('MAIL_USERNAME'),
        //     'subject' => "註冊成功"
        // ];

        // //填寫收信人信箱
        // $to = [
        //     // 'email' => Session::get('email'),
        //     // 'name' => Session::get('name')
        //     'email' =>  env('MAIL_FROM_ADDRESS'),
        //     'name' => env('MAIL_USERNAME')
        // ];

        // //信件的內容(即表單填寫的資料)
        // $data = [
        //     'subject' => "註冊成功",
        //     'msg' => [
        //         "<p>您已於BK網站註冊成功，請點選下列網址進行進一步認證</p>",
        //         "<a href='testtest'>"."testtest"."</a>"
        //     ]
        // ];

        // //寄出信件
        // Mail::send('email.register', $data, function ($message) use ($from, $to) {
        //     $message->from($from['email'], $from['name']);
        //     $message->to($to['email'], $to['name'])->subject($from['subject']);
        // });

        // return env('MAIL_FROM_ADDRESS');
    }
}
