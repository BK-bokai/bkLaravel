<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\User;
use App\Model\Reply;
use App\Model\message_reply;

use Auth;
use Illuminate\Support\Facades\Validator;


class MsgController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $messages = Message::All();
        $msg_replies= message_reply::All();

        // return $messages;
        return view('backend.message', compact('name', 'messages', 'msg_replies'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'msg-content' => ['required', 'string'],
        ], [
            'msg-content.required'    => '請輸入想講的內容。',
        ]);
    }

    public function post(Request $request)
    {
        // $request['id'] = Auth::user()->id;
        // return $request['msg-content'];
        $this->validator($request->all())->validate();
        $message = new Message([
            'body' => $request['msg-content'],
        ]);
        Auth::user()->message()->save($message);
        return redirect()->route('admin.message');

    }

    public function reply(Request $request)
    {

        $reply = new Reply([
            'body' => $request['reply_content'],
        ]);
        Auth::user()->reply()->save($reply);

        $message = message::find( $request->message_id );
        $message->reply()->attach($reply->id);
        return redirect()->route('admin.message');
    }
}
