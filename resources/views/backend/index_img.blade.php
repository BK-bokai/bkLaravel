@section('js')
<script src="{{ asset('js/index_image.js') }}" charset="utf-8"></script>
@endsection

@extends('backend.layouts.master')
@section('title','首頁相片')

@section('content')
<!-- 修改相片表單 -->
<div class="row container">

  <form action='{{route("admin.change_index_img")}}' method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @foreach ($images as $image)
    <?php $path = explode("\\", $image->image_path); ?>

    <!-- {{$path[7]}} -->

    <div class="img_box col s12 m3">

      <div class="col s12">
        <img class="responsive-img" src='{{ asset("img/".end($path)) }}'>
      </div>

      <div class="col s12">
        <label>
          <input class="with-gap" name="index_img" url="{{route('admin.check_index_img',['image'=>$image->id])}}" type="radio" value="{{ $image->id }}" {{ $image->index == 1 ? "checked" : "" }}>
          <span>index</span>
        </label>
      </div>

    </div>
    @endforeach
    <button class="col s12 btn waves-effect waves-light disabled" type="submit">存檔
      <i class="fas fa-save"></i>
    </button>
  </form>

  @endsection