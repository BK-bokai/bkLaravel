@extends('backend.layouts.master')
@section('title','會員管理')
@section('js')
<script src="{{ asset('js/member.js') }}" charset="utf-8"></script>
@endsection
@section('content')
<div class="row container">
    <div class="col s12 memberList">
        <table class="highlight centered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>名字</th>
                    <th>帳號 </th>
                    <th>信箱</th>
                    <th>active </th>
                    <th>操作</th>
                </tr>
            </thead>

            <?php foreach ($members as $member) : ?>
                <tbody user="{{ $member['id'] }}">
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->username}}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->active }}</td>
                        <td>
                        <button style="margin-right: 9px" user-id=" {{ $member['id'] }} " url =" {{ route('admin.do_delmember',['user' => $member->id ] ) }} " class=" del-btn btn waves-effect waves-light red del_mem ">刪除</button>
                        <button user-id=" {{ $member['id'] }} " url =" {{ route('admin.editmember',['user' => $member->id ] ) }} " class=" del-btn btn waves-effect waves-light green edit_mem ">編輯</button>  
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
        <a href="{{route('admin.addmember')}}" class="btn tooltipped btn-floating btn-large waves-effect waves-light black pulse" data-position="bottom" data-tooltip="新增會員">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>

@endsection