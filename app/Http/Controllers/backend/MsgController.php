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
        $msg_replies = message_reply::All();

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

        // trim($request['msg-content']);
        // $request['msg-content']=str_replace(" ","<br>",$request['msg-content']);

        // $request['msg-content']=nl2br(e($request['msg-content']), false);
        // $request['msg-content']=nl2br($request['msg-content']);
        $message = new Message([
            'body' => $request['msg-content'],
        ]);
        Auth::user()->message()->save($message);
        return redirect()->route('admin.message');
    }

    public function delete(Request $request, Message $message)
    {
        $msg_replies = message_reply::where('message_id', $message->id)->get();

        foreach ($msg_replies as $msg_reply) {
            Reply::find($msg_reply->reply_id)->delete();
        }

        message_reply::where('message_id', $message->id)->delete();

        $message->delete();


        return $msg_replies;
    }

    public function update(Request $request, Message $message)
    {
        $message->body=$request->body;
        $message->save();
        return $message;
    }

    public function reply_delete(Request $request, Reply $reply)
    {

        $msg_replies = message_reply::where('reply_id', $reply->id)->delete();
        $reply->delete();

        return $msg_replies;
    }

    public function reply_update(Request $request, Reply $reply)
    {
        $reply->body=$request->body;
        $reply->save();
        return $reply;
    }

    public function reply(Request $request)
    {

        $reply = new Reply([
            'body' => $request['reply_content'],
        ]);
        Auth::user()->reply()->save($reply);

        $message = message::find($request->message_id);
        $message->reply()->attach($reply->id);
        return redirect()->route('admin.message');
    }
}
