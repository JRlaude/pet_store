@extends('layouts.app')
@section('title',$user->getName() . 'Profile | ')

@section('pluginscss')
@endsection

@section('css')

@endsection

@section('content_header')

Profile

@endsection
@section('content')


profile {{$user->getName()}}


@endsection

@section('pluginsjs')
@endsection

@section('js')
@endsection