@extends('layouts.master')

@section('title', 'Social | Add Role')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Role</a></li>
  <li class="active">Add Role</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
  	<h4 class="box-title">Add Role</h4>
  	<small>Basic Information</small>
  </div>
  <div class="box-body">
  	<div class="row">
  	  <div class="col-lg-2 col-md-3 col-sm-2 col-md-offset-1">
  	  	<img src="{{URL::asset('images/avatar2.png')}}" class="img-circle pull-right" alt="User Image">
  	  </div>
  	  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-7">
	  	<form class="form-horizontal" action="{{route('role.create')}}" method="post" enctype="multipart/form-data">
	  	  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
	  	  <div class="form-group">
	  	  	<label>Role</label>
	  	  	<input type="text" name="name" placeholder="Role" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Role Name</label>
	  	  	<input type="text" name="display_name" placeholder="Role Name" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Description</label>
	  	  	<input type="text" name="description" placeholder="Role Description" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Select Permission (Select at least one)</label>
	  	  	<div class="row">
	  	  	  <div class="col-lg-8 col-xs-8">
	  	  	  	<select name="permission" id="permission" class="form-control permission-options">
	  	  	  	  <option value="">-- Select Permission --</option>
	  	  	  	  @foreach($permissions as $permission)
	  	  	  	  <option value="{{$permission->id}}">{{$permission->display_name}}</option>
	  	  	  	  @endforeach
		  	  	</select>
	  	  	  </div>
	  	  	  <div class="col-lg-2 col-xs-2"></div>
	  	  	  <div class="col-lg-2 col-xs-2">
	  	  	  	<button class="btn btn-default" id="add-button" disabled="true">Add</button>
	  	  	  </div>
	  	  	</div>
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Permission Choosen</label>
	  	  	<ol id="choosen-list"></ol>
	  	  </div>
	  	  <input type="text" name="permissions" id="permissions" hidden>
	  	  <input type="text" name="data" id="data" hidden>
	  	  <div class="col-lg-4 col-xs-4 pull-right">
	  	  	<button class="btn btn-danger btn-block" id="submit-button" disabled="true">Save</button>
	  	  </div>
	  	</form>
  	  </div>
  	</div>
  </div>
</div>
@endsection

@section('moreScripts')
<data initials="{{ $initials }}"></data>
<script type="text/javascript" src="{{URL::asset('js/addRole.js')}}"></script>
@endsection