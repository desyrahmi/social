@extends('layouts.master')

@section('title', 'Social | Roles')

@section('pages')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Roles</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
    <h4 class="box-title">Social Roles</h4>
    <small>Basic Information</small>
    <a href="{{route('role.add')}}" class="btn btn-default pull-right">Add Role</a>
  </div>
  <div class="box-body">
  	<table class="table table-hover" id="table-role">
      @php
        $index = 1;
      @endphp
  	  <thead>
  	  	<tr>
  	  	  <th>#</th>
  	  	  <th>Role</th>
  	  	  <th>Name</th>
  	  	  <th>Description</th>
  	  	  <th>Action</th>
  	  	</tr>
  	  </thead>
  	  <tbody>
  	  	@foreach($roles as $role)
	  	  <tr>
	  	  	<td>{{$index++}}</td>
	  	  	<td>{{$role->name}}</td>
	  	  	<td>{{$role->display_name}}</td>
	  	  	<td>{{$role->description}}</td>
	  	  	<td>
            <a href="{{route('role.delete', ['id' => $role->id])}}" class="btn btn-default">delete</a>
            <a href="{{route('role.edit', ['id' => $role->id])}}" class="btn btn-default">update</a>
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
    $('#table-role').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'autoWidth': false
    });
  });
</script>

@endsection