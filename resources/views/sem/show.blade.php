@extends('layouts.app')
@section('title', '用户列表')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin._nav')

        </div>
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li>销售线索</li>
                <li>留言</li>
                <li class="active">详情-{{ $sem->id }}</li>
            </ol>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <h4>有错误发生：</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <ul class="list-group">
                <li class="list-group-item">姓名：{{ $sem->name}}</li>
                <li class="list-group-item">电话：{{ $sem->phone}}</li>
                <li class="list-group-item">日期：{{ $sem->date}}</li>
                <li class="list-group-item">时间：{{ $sem->time}}</li>
                <li class="list-group-item">渠道：{{ $sem->hmsr}}</li>
                <li class="list-group-item">微信号：{{ $sem->wechat_num}}</li>
                <li class="list-group-item">版本：{{ $sem->type}}</li>
                <li class="list-group-item">IP：{{ $sem->ip}}</li>
                <li class="list-group-item">表单位置：{{ $sem->position}}</li>
                <li class="list-group-item">来源：{{ $sem->refferrer}}</li>
                <li class="list-group-item">本地地址：{{ $sem->location}}</li>
                <li class="list-group-item">其他内容：{{ $sem->content}}</li>
            </ul>

        </div>
    </div> 
@stop
