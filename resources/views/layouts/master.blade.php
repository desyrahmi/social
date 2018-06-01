<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.header')
  @include('layouts.sidebar')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Social
        <small>Welcome to Social</small>
      </h1>
      @yield('page')
    </section>
    <section class="content">
      <div id="session">
        <div class="col-md-7">
          @if(Session::has('success') || Session::has('fail'))
            @if(Session::has('fail'))
              <p class="alert {{Session::get('alert-danger','alert-info')}}">{{Session::get('fail')}}</p>
              {{Session::get('fail')}}
            @else
              <p class="alert {{Session::get('alert-success','alert-info')}}">{{Session::get('success')}}</p>
              {{Session::get('success')}}
            @endif
          @endif
        </div>
      </div>
    @yield('content')
    </section>
  </div>
  @include('layouts.footer')
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
  // $(document).ready(function(){
    setTimeout(function(){
      $('#session').fadeOut('fast');
    }, 2000);
  // });
</script>
@yield('moreScripts')
</body>
</html>
