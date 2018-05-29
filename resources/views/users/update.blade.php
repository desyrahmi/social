@extends('layouts.master')

@section('title', 'Social | Profile')

@section('pages')
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">User</a></li>
  <li><a href="#">Profile</a></li>
  <li class="active">Update</li>
</ol>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="box">
        <div class="box-header">
          <h4 class="box-title">{{$user->first_name}} {{$user->last_name}}</h4>
          <small>Basic Information</small>
          <a href="{{route('users')}}" class="btn btn-default pull-right">Cancel</a>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2 col-xs-2">
              <img src="{{URL::asset('images/avatar2.png')}}" class="img-circle pull-right" alt="User Image" style="max-width: 100%">
            </div>
            <div class="col-md-4 col-xs-3">
            <form class="form-horizontal" action="{{route('user.update', ['id' => $user->id])}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="{{$user->gender}}">{{$user->gender}}</option>
                  @if($user->gender == "Male")
                  <option value="Female">Female</option>
                  @else
                  <option value="Male">Male</option>
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Birth Place</label>
                <input type="text" name="place_of_birth" value="{{$user->place_of_birth}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Birth Date</label>
                <input type="date" name="date_of_birth" value="{{$user->date_of_birth}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="{{$user->username}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
              </div>
              <a href="#updatepassword" data-toggle="modal" class="btn btn-default">Update Password</a>
              <a href="#update" data-toggle="modal" class="btn btn-danger pull-right">Save</a>
              <div class="modal fade" id="update">
                <div class="modal-content modal-dialog col-md-offset-3">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Password Confirmation</h4>
                  </div>
                  <div class="col-md-11">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger">Update</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="modal fade" id="updatepassword">
                <div class="modal-content modal-dialog col-md-offset-3">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                  </div>
                  @if(Auth::user()->hasRole('admin'))
                  <form class="form-horizontal" action="{{route('user.updatepassadm', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-md-11">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Retype New Password</label>
                          <input type="password" name="retypepassword" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-danger">Update</button>
                    </div>
                  </form>
                  @else
                  <form class="form-horizontal" method="post" action="{{route('user.updatepass', ['id' => $user->id])}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-md-11">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Old Password</label>
                          <input type="password" name="oldpassword" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Retype New Password</label>
                          <input type="password" name="retypepassword" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-danger">Update</button>
                    </div>
                  </form>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection