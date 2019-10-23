@extends('frontend.layouts.master')
@section('title','BK-Web')
@section('content')
<div class="carousel">
@foreach($images as $image)
@if($image->publish == 1)
<?php $path = explode("\\", $image->image_path); ?>
<a class="carousel-item" href="#one!"><img src='{{ asset("img/".end($path)) }}'></a>
@endif
@endforeach
</div>
@endsection