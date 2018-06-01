@extends('layouts.master')

@section('title', 'Social | Permissions')

@section('pages')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Permissions</li>
</ol>
@endsection

@section('content')
<div class="box">
  <div class="box-header">
  	<h3>Social Permissions</h3>
  </div>
  <div class="box-body">
  	<table class="table table-hover dataTable" id="table-permission">
      @php
        $index = 1;
      @endphp
  	  <thead>
  	  	<tr>
  	  	  <th>#</th>
  	  	  <th>Role</th>
  	  	  <th>Name</th>
  	  	  <th>Description</th>
  	  	  <th>#</th>
  	  	</tr>
  	  </thead>
  	  <tbody>
  	  	@foreach($permissions as $permission)
	  	  <tr>
	  	  	<td>{{$index++}}</td>
	  	  	<td>{{$permission->name}}</td>
	  	  	<td>{{$permission->display_name}}</td>
	  	  	<td>{{$permission->description}}</td>
	  	  	<td>#</td>
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
    $('#table-permission').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'autoWidth': false
    });
  });
</script>

@endsection