@extends('layouts.master')

@section('title', 'Social | Add Post')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Post</a></li>
  <li class="active">Create Post</li>
</ol>
@endsection

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
  	  <div class="box">
  	  	<div class="box-header">
  	  	  <h4 class="box-title">Create Post</h4>
  	  	  <a href="{{route('dashboard')}}" class="btn btn-default pull-right">Cancel</a>
  	  	</div>
  	  	<div class="box-body">
  	  	  <div class="col-md-2">
  	  	  	<img src="{{URL::asset('images/avatar2.png')}}" class="img-circle pull-right" style="max-width: 100%" alt="User Image">
  	  	  </div>
  	  	  <div class="col-md-5">
  	  	  	<form class="form-horizontal" action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
  	  	  	  {{csrf_field()}}
  	  	  	  <div class="form-group">
  	  	  	  	<label>Title</label>
  	  	  	  	<input type="text" name="title" value="{{$post->title}}" class="form-control">
  	  	  	  </div>
  	  	  	  <div class="form-group">
  	  	  	  	<label>Content</label>
  	  	  	  	<input type="text" name="content" value="{{$post->content}}" class="form-control">
  	  	  	  </div>
  	  	  	  <button class="btn btn-default pull-right">Submit</button>
  	  	  	</form>
  	  	  </div>
  	  	</div>
  	  </div>
  	</div>
  </div>
</div>
@endsection