@extends('frontend.layouts.master')
@section('title','忘記密碼')
@section('content')
<div class="row container login">
   <form method="post" action="{{route('password.email')}}" class="col s12 loginform" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="input-field col s12">
         <input id="email" type="email" name="email" class="validate" required>
         <label for="email"><span>電子信箱</span></label>
         @error('email')
         <p class="red-text">{{ $message }}</p>
         @enderror
      </div>


      <div class="row">
         <div class="col s6">
            <button class="btn waves-effect waves-light test" type="submit">重設密碼
               <i class="material-icons right">send</i>
            </button>
            @if (session('status'))
            <p class="teal-text"> {{ session('status') }} </p>
            @endif
            
         </div>
      </div>


   </form>
</div>
@endsection