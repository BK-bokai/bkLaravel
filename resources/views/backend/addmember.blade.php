@extends('backend.layouts.master')
@section('title','會員管理')
@section('js')
<!-- <script src="{{ asset('js/message.js') }}" charset="utf-8"></script> -->
@endsection
@section('content')
<div class="row container register_form">

    <form class="col s12" action="{{route('admin.do_addmember')}}" method="post">

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


        <div class="input-field col s12">
            <select name='level'>
                <!-- <option value="" disabled selected>level3</option> -->
                <option value="1">level1</option>
                <option value="2">level2</option>
                <option value="3" selected>level3</option>
            </select>
            <label>選擇管理權限</label>
        </div>


        <!-- <div class="row"> -->
        <div class="col s6">
            <button class="btn waves-effect waves-light test" type="submit">註冊
                <i class="material-icons right">send</i>
            </button>
            @if (session('status'))
            <p class="teal-text"> {{ session('status') }}
                <p>
                    @endif
        </div>



        <!-- </div> -->
    </form>
</div>
@endsection