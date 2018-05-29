@extends('layouts.master')

@section('title', 'Social | Profile')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">User</a></li>
  <li class="active">Profile</li>
</ol>
@endsection

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-8 col-md-offset-1">
  	  <div class="box">
	    <div class="box-header">
	  	  <h4 class="box-title">{{$user->first_name}} {{$user->last_name}}</h4>
	  	  <small>Basic Information</small>
	  	  <a href="{{route('user.edit', ['id' => Auth::user()->id])}}" class="btn btn-default pull-right">Update</a>
	    </div>
	    <div class="box-body">
	  	  <div class="row">
	  	    <div class="col-md-2 col-xs-2">
	  	  	  <img src="{{URL::asset('images/avatar2.png')}}" class="img-circle pull-right" alt="User Image" style="max-width: 100%">
	  	    </div>
	  	    <div class="col-md-5 col-xs-3">
	  	  	  <table class="table table-striped table-hover">
		  	    <tr>
		  	  	  <td>First Name</td>
		  	  	  <td>{{$user->first_name}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Last Name</td>
		  	  	  <td>{{$user->last_name}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Gender</td>
		  	  	  <td>{{$user->gender}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Phone Number</td>
		  	  	  <td>{{$user->phone}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Username</td>
		  	  	  <td>{{$user->username}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Email</td>
		  	  	  <td>{{$user->email}}</td>
		  	    </tr>
		  	    <tr>
		  	  	  <td>Username</td>
		  	  	  <td>{{$user->username}}</td>
		  	    </tr>
		  	  </table>
	  	    </div>
	  	  </div>
	    </div>
	  </div>
  	</div>
  </div>
</div>
@endsection