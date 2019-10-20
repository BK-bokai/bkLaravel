@section('js')
<script src="{{ asset('') }}" charset="utf-8"></script>
@endsection

@extends('backend.layouts.master')
@section('title','首頁相片')

@section('content')
<!-- 修改相片表單 -->
<div class="row container">

  <form action='' method="post" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    @foreach ($images as $image)
    <?php $path = explode("\\", $image->image_path); ?>

    <!-- {{$path[7]}} -->

    <div class="img_box col s12 m3">

      <div class="col s12">
        <img class="responsive-img" src='{{ asset("img/".end($path)) }}'>
      </div>

      <div class="col s12">
        <label>
          <input data-id="{{ $image->id }}" class="with-gap" name="index_img"
            url='' type="radio" value="1" {{ $image->index == 1 ? "checked" : "" }}>
          <span>index</span>
        </label>
      </div>

      <div class="col s12">

      </div>


    </div>
    @endforeach

  </form>
  @endsection