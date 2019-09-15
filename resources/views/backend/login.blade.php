@extends('backend.layouts.master')
@section('title','登入')
@section('content')
<div class="row container login">
   <form method="post" action="{{url('login')}}" class="col s12 loginform" enctype="multipart/form-data">
   {{ csrf_field() }}

      <div class="row">
         <div class="input-field col s12">
            <input id="username" type="text" class="validate un" name='username'>
            <label for="username"><span class="member">帳號</span></label>
         </div>
      </div>

      <div class="row">
         <div class="input-field col s12">
            <input id="password" type="password" class="validate pw" name='password'>
            <label for="password"><span class="member">密碼</span></label>
         </div>
      </div>

      <div class="row">
         <div class="col s6">
            <button class="btn waves-effect waves-light test" type="submit">登入
               <i class="material-icons right">send</i>
            </button>
         </div>
      </div>


   </form>
</div>
@endsection