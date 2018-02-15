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
                <li class="active">角色与权限</li>
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

            <form class="form-inline" method="POST" action="{{ route('permission.roleStore') }}" style="margin-bottom: 15px;" >
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="sr-only">角色</label>
                    <input type="text" name="name" class="form-control" placeholder="角色">
                </div>
                <button type="submit" class="btn btn-default">新建角色</button>
            </form>

            <form class="form-inline" method="POST" action="{{ route('permission.permissionStore') }}" style="margin-bottom: 15px;" >
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="sr-only" >权限</label>
                    <input type="text" name="name" class="form-control" placeholder="权限">
                </div>
                <button type="submit" class="btn btn-default">新建权限</button>
            </form>


            <form class="form" method="POST" action="{{ route('permission.roleAndPermission') }}" style="margin-bottom: 15px;" >
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="sr-only" >角色</label>
                    <select class="form-control" name="role">
                        <option value="0" disabled selected>选取角色</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="sr-only" >权限</label>
                    <div class="checkbox">
                        @foreach ($permissions as $permission)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-default">绑定</button>
            </form>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>角色</th>
                        <th>操作</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach($role->permissions as $_premission)
                                    {{ $_premission->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@stop
