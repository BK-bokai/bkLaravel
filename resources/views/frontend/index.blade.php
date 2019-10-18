@extends('frontend.layouts.master')
@section('title','BK-Web')
@section('content')
<div class="row container">
  <div class="col s12 m6">
    <div class="card">
      <div class="card-image">
        <?php $path = explode("\\", $index->photo_path); ?>
        <img src='{{ asset("img/".end($path)) }}'>
        <span class="card-title"> <?php echo (ucfirst($index->username)); ?> </span>
      </div>
      <div class="card-content">
        <p class="text">
        {!! nl2br(e($index->content_one )) !!}
        </p>
        <p class="text">
        {!! nl2br(e($index->content_two )) !!}
        </p>
      </div>
    </div>
  </div>

  <div class="intro col s12 m6">
    <p class="text">
      {{ $student->content }}
    </p>
    @foreach ($student_skills as $StudentSkill)
    <a class="waves-effect waves-light btn">  {{ $StudentSkill['skill_name'] }} </a>
    @endforeach
    <hr>
    <p class="text">
      {{ $worker['content'] }}
      <br>
    </p>
    @foreach ($work_skills as $WorkSkill)
    <a class="waves-effect waves-light btn"> {{ $WorkSkill['skill_name'] }} </a>
    @endforeach
  </div>
</div>
@endsection