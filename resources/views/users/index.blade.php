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
                <li class="active">所有用户</li>
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

            <form class="form-inline" method="POST" action="{{ route('users.store') }}" style="margin-bottom: 15px;" >
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="sr-only" for="newUserEmail">姓名</label>
                    <input type="text" name="name" class="form-control" id="newUserName" placeholder="姓名">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="newUserEmail">邮件账号</label>
                    <input type="email" name="email" class="form-control" id="newUserEmail" placeholder="邮件账号">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="newUserPassword3">密码</label>
                    <input type="password" name="password"  class="form-control" id="newUserPassword" placeholder="密码">
                </div>
                <div class="form-group">
                    <label class="sr-only" >角色</label>
                    <select class="form-control" name="role">
                        <option value="0" disabled selected>选取角色</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">新建用户</button>
            </form>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>账号</th>
                        <th>角色</th>
                        <th>操作</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                               @if( count($user->getRoleNames()) )
                                    {{ $user->getRoleNames()[0]}}
                               @else
                                    无
                               @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">操作 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="{{ route('users.edit', $user->id) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            修改</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    删除
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@stop
