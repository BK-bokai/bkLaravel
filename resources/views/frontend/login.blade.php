@extends('frontend.layouts.master')
@section('title','登入')
@section('content')
<div class="row container login">
   <form method="post" action="{{url('login')}}" class="col s12 loginform" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="row">
         <div class="input-field col s12">
            <input id="username" type="text" class="validate un" name='username'>
            <label for="username"><span class="member">帳號</span></label>
            <?php //print_r(Session::get('errors'))?>
            @error('active')
            <p class="red-text"> {{ $message }} </p>
            @enderror

            @error('username')
            <p class="red-text">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="row">
         <div class="input-field col s12">
            <input id="password" type="password" class="validate pw" name='password'>
            <label for="password"><span class="member">密碼</span></label>
            @error('password')
            <p class="red-text">{{ $message }}</p>
            @enderror
         </div>
      </div>




      <div class="row">
         <div class="col s6">
            <button class="btn waves-effect waves-light test" type="submit">登入
               <i class="material-icons right">send</i>
            </button>
            @if (session('status'))
            <p class="teal-text"> {{ session('status') }}  <p>
            @endif
            <?php $success = Session::get('success') ?>
            @if($success)
            <p class="teal-text">{{ $success }}</p>
            <?php unset($success) ?>
            <?php
            session()->forget('success');
            session()->flush();
            ?>
            @endif
         </div>
         <!-- Switch -->
         <div class="switch col s6">
            <p>記住我</p>
            <label>
               Off
               <input name='remember' type="checkbox">
               <span class="lever"></span>
               On
            </label>
         </div>
      </div>


   </form>
</div>
@endsection