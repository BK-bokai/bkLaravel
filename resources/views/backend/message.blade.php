@extends('backend.layouts.master')
@section('title','聊天區')

@section('content')
<div class="row ">
   <!-- po文區 -->
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
         好無聊喔!!
         快來陪我玩
         <hr class="msg-line">
         2則留言
         <hr class="msg-line">
      </div>
   </div>




</div>
@endsection