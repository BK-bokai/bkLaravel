@extends('backend.layouts.master')
@section('title','BK-Web')
@section('js')
<script src="{{ asset('js/index.js') }}" charset="utf-8"></script>
@endsection
@section('content')

<div class="row container">
    <div class="col s12 m6">
        <h3>左半邊</h3>
        <div class="row Content">
            <div class="col s12">
                <div class="input-field col s12">
                    <textarea name="index_content_one" id="photoContent1" class="materialize-textarea" >{{ $index->content_one }}</textarea>
                    <label for="photoContent1">第一段</label>
                </div>
            </div>

            <div class="col s12">
                <div class="input-field col s12">
                    <textarea name="index_content_two" id="photoContent2" class="materialize-textarea" >{{ $index->content_two }}</textarea>
                    <label for="photoContent2">第二段</label>
                </div>

                <button url="{{route('admin.index_edit',['index' => 1,'student' => 1,'worker' => 1])}}" id="index_submit" class="btn waves-effect waves-light " name="action">存檔
                    <i class="fas fa-save"></i>
                </button>
            </div>
        </div>
    </div>


    <div class="col s12 m6">
        <h3>右半邊</h3>
        <div class="row Content">
            <div class="col s12">
                <div class="input-field col s12">
                    <textarea name="student_content" id="studentContent" class="materialize-textarea">{{ $student->content }}</textarea>
                    <label for="studentContent">第一段</label>
                </div>
            </div>

            <div class="col s12">
                <div class="input-field col s12">
                    <textarea name="worker_content" id="workContent" class="materialize-textarea">{{ $worker->content }}</textarea>
                    <label for="workContent">第二段</label>
                </div>
            </div>
        </div>
    </div>




    <div class="col s12 m6">
        <div class="row">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4>學生時期<br>技能列表
                    </h4>
                </li>

                @foreach ($student_skills as $StudentSkill)
                <li class="collection-item">
                    <div>{{ $StudentSkill['skill_name'] }}<a href="javascript:void(0);" class="skill_del secondary-content red-text" data-id="{{ $StudentSkill['id'] }}"><i class="fas fa-trash"></i></a></div>
                </li>
                @endforeach

                <li class="collection-item">
                    <form id='add_skill'>
                        <div>
                            <input name='addskill' type="text" placeholder="請輸入要新增的技能">
                            <button class="btn waves-effect waves-light" type="submit">新增技能
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>





    <div col class="col s12 m6">
        <div class="row">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4>工作經驗<br>技能列表
                    </h4>
                </li>

                @foreach ($work_skills as $WorkSkill)
                <li class="collection-item">
                    <div>{{ $WorkSkill['skill_name'] }}<a href="javascript:void(0);" class="skill_del secondary-content red-text" data-id="{{ $WorkSkill['id'] }}"><i class="fas fa-trash"></i></a></div>
                </li>
                @endforeach

                <li class="collection-item">
                    <form id='add_skill'>
                        <div>
                            <input name='addskill' type="text" placeholder="請輸入要新增的技能">
                            <button class="btn waves-effect waves-light" type="submit">新增技能
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</div>
@endsection