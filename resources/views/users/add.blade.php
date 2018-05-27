@extends('layouts.master')

@section('title', 'Social | Add User')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">User</a></li>
  <li class="active">Add User</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
  	<h4 class="box-title">Add User</h4>
  	<small>Basic Information</small>
  </div>
  <div class="box-body">
  	<div class="row">
  	  <div class="col-md-2 col-xs-2">
  	  	<img src="{{URL::asset('images/avatar2.png')}}" class="img-circle pull-right" alt="User Image">
  	  </div>
  	  <div class="col-md-3 col-xs-3">
	  	<form class="form-horizontal" action="" method="post">
	  	  <!-- {{csrf_field()}} -->
	  	  <div class="form-group">
	  	  	<label>First Name</label>
	  	  	<input type="text" name="first_name" placeholder="Fisrt Name" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Last Name</label>
	  	  	<input type="text" name="last_name" placeholder="Last Name" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Gender</label>
	  	  	<input type="text" name="gender" placeholder="Male/Female" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Phone Number</label>
	  	  	<input type="text" name="phone" placeholder="+6211111" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Birth Place</label>
	  	  	<input type="text" name="place_of_birth" placeholder="Birth Place" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Birth Date</label>
	  	  	<input type="date" name="date_of_birth" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Username</label>
	  	  	<input type="text" name="username" placeholder="Username" class="form-control">
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Email</label>
	  	  	<input type="email" name="email" placeholder="email@email.email" class="form-control" required>
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Password</label>
	  	  	<input type="password" name="password" placeholder="Password" class="form-control" required>
	  	  </div>
	  	  <div class="form-group">
	  	  	<label>Retype Password</label>
	  	  	<input type="password" name="retype-password" placeholder="Retype Password" class="form-control" required>
	  	  </div>
	  	  @if(Auth::user()->hasRole('admin'))
	  	  <div class="form-group">
	  	  	<label>Role</label>
	  	  	<select name="role">
	  	  	  @foreach($roles as $role)
	  	  	  <option value="{{$role->name}}">{{$role->display_name}}</option>
	  	  	  @endforeach
	  	  	</select>
	  	  </div>
	  	  @endif
	  	  <div class="col-md-4 col-xs-4 pull-right"><a href="" class="btn btn-danger btn-block">Save</a></div>
	  	</form>
  	  </div>
  	</div>
  </div>
</div>
@endsection