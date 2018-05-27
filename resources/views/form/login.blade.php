<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Social | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body class="fixed skin-blue sidebar-mini">
<div class="content fixed">
  <div class="row">
    <div class="col-md-6 col-xs-6">
      <div class="text-center">
        <h2>Welcome to Social</h2>
        <h2>Create your own world!</h2>
      </div>
    </div>
    <div class="col-md-6 col-xs-6">
      <div class="content">
        <form action="{{route('doLogin')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
              <div class="col-md-4 col-xs-4">
                <div class="form-group">
                  <input type="text" name="userlogin" placeholder="Username or Email" class="form-control">
                </div>
              </div>
              <div class="col-md-4 col-xs-4">
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
              </div>
              <div class="col-md-2 col-xs-2">
                <div class="form-group">
                  <button class="btn btn-default btn-block">Login</button>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4 col-xs-4">
              </div>
              <div class="col-md-4 col-xs-4">
                <a href="" class="pull-right">Forgot Password?</a>
              </div>
              <div class="col-md-2 col-xs-2">
              </div>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-3 col-xs-3"></div>
              <div class="col-md-4 col-xs-4">
                <a href="{{route('signup')}}" class="btn btn-default btn-block">Sign Up</a>
                <a href="{{route('login')}}" class="btn btn-default btn-block">Login</a>
              </div>
              <div class="col-md-3 col-xs-3"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  

  <footer class="footer">
    <strong>Copyright &copy; 2014-2016 <a href="#">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>