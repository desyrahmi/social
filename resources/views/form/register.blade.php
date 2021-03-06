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
        <form class="container" action="{{route('register')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="col-md-5 col-xs-5 text-center">
            <div class="header">
              <h1 class="title">Sign Up</h1>          
            </div>
            <div class="form-group">
              <input type="text" name="first_name" placeholder="First Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="last_name" placeholder="Last Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control" id="email">
              <span id="validate-email"></span>
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="retypepassword" placeholder="Retype Password" class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-default btn-block" id="register">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<footer style="padding: 15px; margin-top: 150px; background-color: white;">
  <strong>Copyright &copy; 2018 <a href="{{route('dashboard')}}">Social</a>.</strong> Create your own world.
</footer>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#email').blur(function() {
    let validateEmail = '';
    let email = $('#email').val();
    let _token = $('input[name="_token"]').val();
    const filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!filter.test(email)) {
      $('#error').addClass('has-error');
      $('#validate-email').html('<label class="text-danger">Invalid Email</label>');
      $('#register').attr('disabled', true);
    } else {
      $.ajax({
        url: "{{route('email.check')}}",
        method: "POST",
        data: {email:email, _token:_token},
        success: function(result) {
          if(result == 'unique') {
            $('#validate-email').html('<label class="text-success">Email Available</label>');
            $('#email').removeClass('has-error');
            $('#register').attr('disabled', false);
          } else {
            $('#validate-email').html('<label class="text-danger">Email Not Available</label>');
            $('#email').addClass('has-error');
            $('#register').attr('disabled', true);
          }
        }
      });
    }
  });
});
</script>
</body>
</html>