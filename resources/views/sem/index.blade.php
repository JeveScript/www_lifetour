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
                <li class="active">留言</li>
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

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>日期</th>
                        <th>时间</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>渠道</th>
                        <th>版本</th>
                        <th>更多</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach ($sems as $index=>$sem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sem->date }}</td>
                            <td>{{ $sem->time }}</td>
                            <td>{{ $sem->name }}</td>
                            <td>{{ $sem->phone }}</td>
                            <td>{{ $sem->hmsr }}</td>
                            <td>{{ $sem->type }}</td>
                            <td>
                                @if(Route::currentRouteName() === 'sem.jidian.index')
                                    <a href="{{ Route('sem.jidian.show' , $sem->id) }}">查看详情</a>
                                @elseif(Route::currentRouteName() === 'sem.senke.index')
                                    <a href="{{ Route('sem.senke.show' , $sem->id) }}">查看详情</a>
                                @else
                                    <a href="javascript:;">查看详情</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@stop
