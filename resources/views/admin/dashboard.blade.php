@extends('admin.layouts.index')

@section('title')
    Dashboard
@endsection

@section('contentheader')
    الرئسيه
@endsection

@section('contentheaderlink')
    العرض الحالى
@endsection

@section('contentheaderactive')
    <a href="{{ route('admin.dashboard') }}"> الرئسيه </a>
@endsection

@section('content')



@endsection
