@section('js')
<script src="{{ asset('js/register.js') }}" charset="utf-8"></script>
@endsection

@extends('frontend.layouts.master')
@section('title','會員註冊')

@section('content')
<div class="row container register_form">

  <form class="col s12" action="{{url('/register')}}" method="post">

    @csrf
    <!-- <div class="row"> -->
    <div class="input-field col s12">
      <input id="name" type="text" name="name" class="validate un black-text">
      <label for="name">
        <span>名稱</span>
      </label>
      @error('name')
      <p class="red-text">{{ $message }}</p>
      @enderror
    </div>
    <!-- </div> -->

    <!-- <div class="row"> -->
    <div class="input-field col s12">
      <input id="username" name="username" type="text" class="validate">
      <label for="username"><span>帳號</span></label>
      @error('username')
      <p class="red-text">{{ $message }}</p>
      @enderror
    </div>
    <!-- </div> -->

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

    <!-- <div class="row"> -->
    <div class="input-field col s12">
      <input id="email" type="text" name="email" class="validate">
      <label for="email"><span>電子信箱</span></label>
      @error('email')
      <p class="red-text">{{ $message }}</p>
      @enderror
    </div>
    <!-- </div> -->

    <!-- <div class="input-field col s12"> -->
      <!-- <select name='level' > -->
        <!-- <option value="" disabled selected>level3</option> -->
        <!-- <option value="3"  selected>level3</option> -->
      <!-- </select> -->
      <!-- <label >選擇管理權限</label> -->
    <!-- </div> -->

    <input type="hidden" name="level" value="3">
    <input type="hidden" name="active" value="no">
    <!-- <div class="row"> -->
    <div class="col s6">
      <button class="btn waves-effect waves-light test" type="submit">註冊
        <i class="material-icons right">send</i>
      </button>
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

    <!-- </div> -->
  </form>
</div>
@endsection