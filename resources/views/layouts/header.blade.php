<header class="main-header">
  <a href="{{route('dashboard')}}" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
    <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{URL::asset('images/avatar5.png')}}" class="img-circle" alt="User Image">
              <p>
                {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                <small>Member since {{date("d M Y", strtotime(Auth::user()->created_at))}}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{route('profile', ['id' => Auth::user()->id])}}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
