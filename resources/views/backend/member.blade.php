@extends('backend.layouts.master')
@section('title','會員管理')
@section('js')
<!-- <script src="{{ asset('js/message.js') }}" charset="utf-8"></script> -->
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
                    <th>操作</th>
                </tr>
            </thead>
            <?php foreach ($members as $member) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $member['id'] ?></td>
                        <td><?php echo $member['name'] ?></td>
                        <td><?php echo $member['username'] ?></td>
                        <td> <button data-id="<?php echo $member['id'] ?>" class=" del-btn btn waves-effect waves-light red del_img ">刪除</td>
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