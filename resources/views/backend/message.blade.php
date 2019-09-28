@extends('backend.layouts.master')
@section('title','聊天區')
@section('js')
<script src="{{ asset('js/message.js') }}" charset="utf-8"></script>
@endsection
@section('content')
<div class="row ">
   <!-- po文區 -->
   <form method="post" action="{{ route("msg-post") }}" class="col s12 post-form">
         @csrf
      <div class="col s12 m8 offset-m2 l6 offset-l3">
         <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
               <div class="input-field col s12">
                  <i class="material-icons prefix">textsms</i>
                  <textarea id="autocomplete-input" name='msg-content' class="materialize-textarea"></textarea>
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