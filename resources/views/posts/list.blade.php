@extends('layouts.master')
@section('title', 'Social | Posts')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
  <li class="active">Posts</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
  	<h4 class="box-title">Posts</h4>
  	<a href="{{route('post.add')}}" class="btn btn-default pull-right">Create Post</a>
  </div>
  <div class="box-body">
  	<table class="table table-hover" id="table-user">
      @php
        $index = 1;
      @endphp
  	  <thead>
  	  	<tr>
          <th>#</th>
  	  	  <th>Title</th>
  	  	  <th>Content</th>
  	  	  <th>Action</th>
  	  	</tr>
  	  </thead>
  	  <tbody>
  	  	@foreach($posts as $post)
	  	  <tr>
          <td>{{$index++}}</td>
	  	  	<td>{{$post->title}}</td>
	  	  	<td>{{$post->content}}</td>
	  	  	<td>
            <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-default">delete</a>
            <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-default">update</a>   
          </td>
	  	  </tr>
  	  	@endforeach
  	  </tbody>
  	</table>
  </div>
</div>
@endsection