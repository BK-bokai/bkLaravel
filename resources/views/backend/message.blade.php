@extends('backend.layouts.master')
@section('title','聊天區')
@section('js')
<script src="{{ asset('js/message.js') }}" charset="utf-8"></script>
@endsection
@section('content')


<div style="display:none" class="row" id='edit'>
   <form class="col s12">
      <div class="row">
         <div class="input-field col s12">
            <textarea id="textarea1" class="AutoHeight materialize-textarea" cols="30" rows="10"></textarea>
         </div>
      </div>
      <button id='msgEdit' type="submit" class="btn waves-effect waves-light" style="margin-bottom: 2vh;">確認</button>
   </form>
</div>
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
<div class="row" msg="message{{ $message->id }}">
   <!-- 文章內容 -->
   <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel grey lighten-5 z-depth-1">
         <div class="row valign-wrapper">
            <div class="col s10">
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

            <!-- Dropdown Trigger -->
            <a class='dropdown-trigger btn grey darken-1' href='#' data-target='dropdown{{ $message->id }}'>Drop Me!</a>

            <!-- Dropdown Structure -->
            <ul id='dropdown{{ $message->id }}' class='dropdown-content'>
               <li>
                  <a href="#!" class="red-text msgDel" url='{{url("admin/message/$message->id")}}' msgId="{{ $message->id }}">
                     <i class="material-icons msgI">delete</i>
                     刪除
                  </a>
               </li>
               <li>
                  <a href="#!" class="green-text msgEdit" url='{{url("admin/message/$message->id")}}' msgId="{{ $message->id }}">
                     <i class="material-icons msgI">edit</i>
                     編輯
                  </a>
               </li>
            </ul>

         </div>
         <!-- 文章內容 -->
         <div class="row center-align msg-contain flow-text" msgcontain='{{ $message->id }}'>
            {!! nl2br(e($message->body)) !!}

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
                  <form msgId="{{ $message->id }}" method="post" style="display: none" action='{{ route("admin.msg-reply") }}' class="col s12 reply-form" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="message_id" value="{{ $message->id }}">
                     <div class="input-field col s12">
                        </label>
                        <i class="material-icons prefix">textsms</i>
                        <textarea id="reply-text{{ $message->id }}" class="materialize-textarea" name="reply_content"></textarea>
                        <label for="reply-text{{ $message->id }}">請輸入回覆內容
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
         <div class="row valign-wrapper" reply="reply{{ $reply->id }}">
            <div class="col s12 reply-range">
               <div class="col s1">
                  <div class="chip">
                     <!-- 大頭貼 -->
                     {{-- <img src="http://laravel.local/img/IMAG0448.jpg" alt="Contact Person"> --}}
                     <!-- 名稱 -->
                     {{ $reply_user }}
                  </div>
               </div>
               <div class='col s10'>
                  <span class="col s10" replycontain="{{ $reply->id }}">
                     {!! nl2br(e( $reply->body)) !!}
                     <br>
                  </span>
                  <div class="col s2">
                     <!-- Dropdown Trigger -->
                     <a class='dropdown-trigger btn grey darken-1 replyBut' href='#' data-target='reply{{ $message->id }}_{{ $reply->id }}'>Drop
                        Me!</a>

                     <!-- Dropdown Structure -->
                     <ul id='reply{{ $message->id }}_{{ $reply->id }}' class='dropdown-content'>
                        <li>
                           <a href="#!" class="red-text replyDel" url='{{url("admin/reply/$reply->id")}}' replyId="{{ $reply->id }}">
                              <i class="material-icons msgI">delete</i>
                              刪除
                           </a>
                        </li>
                        <li>
                           <a href="#!" class="green-text replyEdit" url='{{url("admin/reply/$reply->id")}}' replyId="{{ $reply->id }}">
                              <i class="material-icons msgI">edit</i>
                              編輯
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>



            </div>
         </div>
         @endif

         @endforeach


         {{-- <hr class="msg-line"> --}}
      </div>
   </div>
</div>
@endforeach


@endsection