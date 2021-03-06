@extends('layouts.master')
@section('title', 'Social | Users')

@section('page')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
  <li class="active">Users</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
  	<h3>Social Users</h3>
  </div>
  <div class="box-body">
  	<table class="table table-hover dataTable" id="table-user">
      @php
        $index = 1;
      @endphp
  	  <thead>
  	  	<tr>
          <th>#</th>
  	  	  <th>Name</th>
  	  	  <th>Gender</th>
  	  	  <th>Username</th>
  	  	  <th>Email</th>
  	  	  <th>Action</th>
  	  	</tr>
  	  </thead>
  	  <tbody>
  	  	@foreach($users as $user)
	  	  <tr>
          <td>{{$index++}}</td>
	  	  	<td>{{$user->first_name}} {{$user->last_name}}</td>
	  	  	<td>{{$user->gender}}</td>
	  	  	<td>{{$user->username}}</td>
	  	  	<td>{{$user->email}}</td>
	  	  	<td>
            <a href="{{route('user.delete', ['id' => $user->id])}}" class="btn btn-default">delete</a>
            <a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-default">update</a>   
          </td>
	  	  </tr>
  	  	@endforeach
  	  </tbody>
  	</table>
  </div>
</div>
@endsection

@section('moreScripts')
<script type="text/javascript">
  $(function() {
    $('#table-user').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'autoWidth': false
    });
  });
</script>

@endsection