@extends('layouts.master')
@section('title', 'Social | Dashboard')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="container">
    <a href="{{route('post.add')}}" class="btn btn-default pull-right">Create Post</a>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      @foreach($posts as $post)
      <div class="box">
        <div class="box-header">
          <h4 class="box-title">{{$post->user->username}}</h4>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <h3 class="box-title">{{$post->title}}</h3>
          {{$post->content}}
        </div>
        <div class="box-footer">
          <small>Created by : <a href="{{route('profile', ['id' => $post->user->id])}}">{{$post->user->first_name}} {{$post->user->last_name}}</a></small>
          <small class="pull-right">{{date("d M Y", strtotime($post->created_at))}}</small>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection


