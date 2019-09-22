@extends('frontend.layouts.master')
@section('title','重設密碼')
@section('content')
<div class="row container login">
   <form method="post" action="{{ route('password.update')}}" class="col s12 loginform" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="email" value="{{ $email }}">

      <!-- <div class="row"> -->
      <div class="input-field col s12">
         <input id="password" type="password" name="password" class="validate">
         <label for="password"><span>密碼(8~10碼含英文)</span></label>
         @error('password')
         <p class="red-text">{{ $message }}</p>
         @enderror
      </div>
      <!-- </div> -->

      <!-- <div class="row"> -->
      <div class="input-field col s12">
         <input id="repassword" type="password" name="password_confirmation" class="validate">
         <label for="repassword"><span>確認密碼</span></label>
         @error('password_confirmation')
         <p class="red-text">{{ $message }}</p>
         @enderror
      </div>
      <!-- </div> -->
      @error('token')
      <p class="red-text">{{ $message }}</p>
      @enderror

      @error('email')
      <p class="red-text">{{ $message }}</p>
      @enderror


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