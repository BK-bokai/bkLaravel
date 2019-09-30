@extends('backend.layouts.master')
@section('title','聊天區')
@section('js')
<script src="{{ asset('js/message.js') }}" charset="utf-8"></script>
@endsection
@section('content')
{{-- {{ $message }} --}}
<div class="row ">
   <!-- po文區 -->
   <form method="post" action='{{ route("admin.msg-post") }}' class="col s12 post-form">
      @csrf
      <div class="col s12 m8 offset-m2 l6 offset-l3">
         <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
               <div class="input-field col s12">
                  <i class="material-icons prefix">textsms</i>
                  <textarea id="autocomplete-input" name='msg-content' class="materialize-textarea" required></textarea>
                  <label for="autocomplete-input">你想講些什麼?</label>
               </div>
               <div class="row ">
                  <div class="col s12">
                     <button class="btn waves-effect waves-light" type="submit">
                        post
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
{{-- {{ $msg_reply }} --}}
@foreach ($messages as $message)
<div class="row ">
   <!-- 文章內容 -->
   <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel grey lighten-5 z-depth-1">
         <div class="row valign-wrapper">
            <div class="chip">
               <!-- 大頭貼 -->
               {{-- <img src="http://laravel.local/img/IMAG0448.jpg" alt="Contact Person"> --}}
               @php
               $user = App\Model\User::find($message->user_id)
               @endphp
               <!-- 名稱 -->
               {{ $user->name }}
            </div>
         </div>
         <!-- 文章內容 -->
         <div class="row center-align msg-contain flow-text">
            {{ $message->body }}
         </div>
         @php
          $tmp = 0;   
         @endphp
         @foreach ($msg_replies as $msg_reply)
         @if($msg_reply->message_id == $message->id)
         @php
          $tmp += 1;    
         @endphp
         @endif
         @endforeach


         <div class="row msg-line">
            <div class="col s6 center-align ">
               <button class="btn waves-effect waves-light msg-func disabled">
                  {{ $tmp }}則留言
               </button>
            </div>
            <div class="col s6 center-align ">
               <button msgId="{{ $message->id }}" class="btn waves-effect waves-light msg-func">
                  留言
               </button>
            </div>
         </div>

         <!-- 回覆傳送區-->
         <div class="row">
            <div class="col s12">
               <div class="row">
                  <form msgId="{{ $message->id }}" method="post" style="display: none" action='{{ route("admin.msg-reply") }}'
                     class="col s12 reply-form" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="message_id" value="{{ $message->id }}">
                     <div class="input-field col s12">
                        <i class="material-icons prefix">textsms</i>
                        <textarea id="reply-text" class="materialize-textarea" name="reply_content"></textarea>
                        <label for="reply-text">請輸入回覆內容</label>
                     </div>
                     <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit">
                           留言
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <!-- 回覆區 -->
         @foreach ($msg_replies as $msg_reply)
         @if($msg_reply->message_id == $message->id)
         @php
            $reply=App\Model\Reply::find($msg_reply->reply_id);
            $reply_user=App\Model\User::find($reply->user_id)->name;
            // $user = App\Model\User::find($message->user_id)

         @endphp
         <div class="row valign-wrapper ">
            <div class="col s12 reply-range">
               <div class="chip">
                  <!-- 大頭貼 -->
                  <img src="http://laravel.local/img/IMAG0448.jpg" alt="Contact Person">
                  <!-- 名稱 -->
                  {{ $reply_user }}
               </div>
               {{ $reply->body }}
            </div>
         </div>
         @endif

         @endforeach


         {{-- <hr class="msg-line"> --}}
      </div>
   </div>
</div>
@endforeach

<div class="row ">
   <!-- 文章內容 -->
   <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel grey lighten-5 z-depth-1">
         <div class="row valign-wrapper">
            <div class="chip">
               <!-- 大頭貼 -->
               <img src="http://laravel.local/img/IMAG0448.jpg" alt="Contact Person">
               <!-- 名稱 -->
               劉博凱
            </div>
         </div>
         <!-- 文章內容 -->
         <div class="row center-align msg-contain flow-text">
            好無聊喔!!
            快來陪我玩
         </div>

         {{-- <hr class="msg-line">
         2則留言
         <hr class="msg-line"> --}}
         <div class="row msg-line">
            <div class="col s6 center-align ">
               <button class="btn waves-effect waves-light msg-func disabled">
                  2則留言
               </button>
            </div>
            <div class="col s6 center-align ">
               <button class="btn waves-effect waves-light msg-func">
                  留言
               </button>
            </div>
         </div>

         <!-- 回覆傳送區-->
         <div class="row">
            <div class="col s12">
               <div class="row">
                  <form method="post" style="display: none" action="" class="col s12 reply-form"
                     enctype="multipart/form-data">
                     @csrf
                     <div class="input-field col s12">
                        <i class="material-icons prefix">textsms</i>
                        <textarea id="reply-text" class="materialize-textarea"></textarea>
                        <label for="reply-text">請輸入回覆內容</label>
                     </div>
                     <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit">
                           留言
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <!-- 回覆區 -->
         <div class="row valign-wrapper ">
            <div class="col s12 reply-range">
               <div class="chip">
                  <!-- 大頭貼 -->
                  <img src="http://laravel.local/img/IMAG0448.jpg" alt="Contact Person">
                  <!-- 名稱 -->
                  劉博凱
               </div>
               我阿我陪你
            </div>
         </div>

         {{-- <hr class="msg-line"> --}}
      </div>
   </div>




</div>
@endsection