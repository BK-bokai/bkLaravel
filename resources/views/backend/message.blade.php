@extends('backend.layouts.master')
@section('title','聊天區')

@section('content')
<div class="row container">
   <ul class="collection with-header">
      <li class="collection-item avatar">
         <img src="http://laravel.local/img/IMAG0448.jpg" alt="" class="circle">
         <span class="title">劉博凱</span>
         <br>
         <h5>好無聊喔!!</h5>
      </li>
      <li class="collection-item avatar">
         <img src="http://laravel.local/img/IMAG0448.jpg" alt="" class="circle">
         <span class="title">劉博凱</span>
         <h5>好無聊喔!!</h5>
      </li>
      <li class="collection-item avatar">
         <div class="col 12">
            <img src="http://laravel.local/img/IMAG0448.jpg" alt="" class="circle">
            <h6 class="blue-text ">
               Alvin
            </h6>
         </div>
         <div class="col s10 left-align">
            <h6 class="blue-text ">
               Alvin
            </h6>
         </div>


      </li>
      <li class="collection-item">Alvin</li>
      <li class="collection-item">Alvin</li>
   </ul>

</div>
@endsection