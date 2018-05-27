@extends('layouts.master')

@section('title', 'Social | Update Role')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Role</a></li>
  <li class="active">Update Role</li>
</ol>
@endsection

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
  	  <div class="box">
  	  	<div class="box-header">
  	  	  <h4 class="box-title">Update Role</h4>
  	  	  <a href="{{route('roles')}}" class="btn btn-default pull-right">Cancle</a>
  	  	</div>
  	  	<div class="box-body">
  	  	  <div class="col-md-5 col-md-offset-1">
  	  	  	<form class="form-horizontal" action="{{route('role.update', ['id' => $role->id])}}" method="post" enctype="multipart/form-data">
  	  	  	  {{csrf_field()}}
  	  	  	  <div class="form-group">
  	  	  	  	<label>Role</label>
  	  	  	  	<input type="text" name="name" class="form-control" value="{{$role->name}}">
  	  	  	  </div>
  	  	  	  <div class="form-group">
  	  	  	  	<label>Display Name</label>
  	  	  	  	<input type="text" name="display_name" class="form-control" value="{{$role->display_name}}">
  	  	  	  </div>
  	  	  	  <div class="form-group">
  	  	  	  	<label>Description</label>
  	  	  	  	<input type="text" name="description" class="form-control" value="{{$role->description}}">
  	  	  	  </div>
  	  	  	  <div class="form-group">
  	  	  	  	<label>Permission</label><br>
  	  	  	  	@foreach($permissions as $permission)
  	  	  	  	<input type="checkbox" value="{{$permission->id}}" {{in_array($permission->id, $rolePermissions) ? "checked" : null}} name="permissions[]">{{$permission->display_name}}<br>
  	  	  	  	@endforeach
  	  	  	  </div>
  	  	  	  <button class="btn btn-default pull-right">Save</button>
  	  	  	</form>
  	  	  </div>
  	  	</div>
  	  </div>
  	</div>
  </div>
</div>
@endsection