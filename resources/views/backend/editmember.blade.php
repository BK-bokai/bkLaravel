@extends('backend.layouts.master')
@section('title','會員管理')
@section('js')
<script src="{{ asset('js/editMember.js') }}" charset="utf-8"></script>
@endsection
@section('content')
<div class="row container register_form">

    <form class="col s12" action="{{route('admin.do_editmember',['user'=>$user->id])}}" method="post">

        @csrf
        @method('PUT')
        <!-- <div class="row"> -->
        <div class="input-field col s12">
            <input url="{{route('admin.do_check',['user'=>$user->id])}}" id="name" type="text" name="name" class="validate un black-text" value="{{$user->name}}">
            <label for="name">
                <span>名稱</span>
            </label>
            @error('name')
            <p class="red-text">{{ $message }}</p>
            @enderror
            <p class="js_name_error red-text"></p>
        </div>
        <!-- </div> -->

        <!-- <div class="row"> -->
        <div class="input-field col s12">
            <input url="{{route('admin.do_check',['user'=>$user->id])}}" id="username" name="username" type="text" class="validate" value="{{$user->username}}">
            <label for="username"><span>帳號</span></label>
            @error('username')
            <p class="red-text">{{ $message }}</p>
            @enderror
            <p class="js_username_error red-text"></p>
        </div>
        <!-- </div> -->


        <!-- <div class="row"> -->
        <div class="input-field col s12">
            <input url="{{route('admin.do_check',['user'=>$user->id])}}" id="email" type="text" name="email" class="validate" value="{{$user->email}}">
            <label for="email"><span>電子信箱</span></label>
            @error('email')
            <p class="red-text">{{ $message }}</p>
            @enderror
            <p class="js_email_error red-text"></p>
        </div>
        <!-- </div> -->
        <div class="input-field col s12">
            <select name='level' url="{{route('admin.do_check',['user'=>$user->id])}}">
                <!-- <option value="" disabled selected>level3</option> -->
                <option value="1" {{ $user->level == 1 ? "selected" : "" }}>level1</option>
                <option value="2" {{ $user->level == 2 ? "selected" : "" }}>level2</option>
                <option value="3" {{ $user->level == 3 ? "selected" : "" }}>level3</option>
            </select>
            <label>選擇管理權限</label>
            @error('level')
            <p class="red-text">{{ $message }}</p>
            @enderror
        </div>

        <!-- <div class="row"> -->
        <div class="col s6">
            <button class="btn waves-effect waves-light test disabled" type="submit">送出
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