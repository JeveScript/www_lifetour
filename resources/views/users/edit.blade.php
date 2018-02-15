@extends('layouts.app')
@section('title', '用户列表')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin._nav')

        </div>
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li>用户管理</li>
                <li class="active">修改用户</li>
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

            <form class="form" method="POST" action="{{ route('users.update', $user->id) }}" accept-charset="UTF-8" style="margin-bottom: 15px;" >
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="sr-only" >姓名</label>
                    <input type="text" name="name" class="form-control" placeholder="姓名" value="{{ $user->name}}">
                </div>
                <div class="form-group">
                    <label class="sr-only" >邮件账号</label>
                    <input type="email" name="email" disabled class="form-control" placeholder="邮件账号" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" >修改密码</label>
                    <input type="password" name="password"  class="form-control" placeholder="修改密码" value="">
                </div>
                <div class="form-group">
                    <select class="form-control" name="role">

                        @if( !count($user->getRoleNames()) )
                            <option value="0" disabled selected>选取角色</option>
                        @endif

                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                            @if( count($user->getRoleNames()) && $role->name == $user->getRoleNames()[0])
                                selected
                            @endif
                            >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>{{ !$user->getRoleNames() }}</div>
                <button type="submit" class="btn btn-default pull-right">修改用户</button>
            </form>
        </div>
    </div> 
@stop
