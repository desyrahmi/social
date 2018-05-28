<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Social | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body class="fixed skin-blue sidebar-mini">
<div class="container content">
  <div class="row">
    <div class="col-md-6 col-md-offset-8 content">
      <form action="{{route('doLogin')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="userlogin" placeholder="Username or Email" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="col-md-2 col-md-offset-1">
            <button class="btn btn-default">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="content"></div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <h2>Welcome to Social</h2>
            <h2>Create your own world!</h2>
          </div>
          <div class="col-md-6 content">
            <div class="col-md-6 col-md-offset-5 content">
              <a href="{{route('signup')}}" class="btn btn-default btn-block">Sign Up</a>
            </div>
            <div class="col-md-6 col-md-offset-5">
              <a href="{{route('login')}}" class="btn btn-default btn-block">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="content"></div>
</div>
<footer style="padding: 15px; margin-top: 50px; background-color: white;">
  <strong>Copyright &copy; 2018 <a href="{{route('dashboard')}}">Social</a>.</strong> Create your own world.
</footer>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>