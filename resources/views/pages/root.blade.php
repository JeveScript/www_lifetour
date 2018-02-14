@extends('layouts.app')
@section('title', '首页')

@section('content')

    @guest
        @include('pages.guest')
    @else
        @include('pages.admin')
    @endguest
    
@stop