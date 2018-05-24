<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Social | Sign Up</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body class="skin-blue sidebar-mini">
<div class="content">
  <div class="row">
    <div class="content"></div>
  </div>
  <div class="row">
    <div class="col-md-6 col-xs-6">
      <div class="text-center content">
        <h2>Welcome to Social</h2>
        <h2>Create your own world!</h2>
      </div>
    </div>
    <div class="col-md-6 col-xs-6">
      <div class="register-box-body modal-dialog">
        <form class="container" action="{{route('register')}}" class="" method="post">
          {{csrf_field()}}
          <div class="col-md-5 col-xs-5 text-center">
            <div class="header">
              <h1 class="title">Sign Up</h1>          
            </div>
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="retype-password" placeholder="Retype Password" class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-default btn-block">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <div class="content"></div>

  <footer class="footer">
    <strong>Copyright &copy; 2014-2016 <a href="#">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>