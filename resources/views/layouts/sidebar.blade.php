<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{URL::asset('images/avatar5.png')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @if(Auth::user()->hasRole('admin'))
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i>List User</a></li>
        <li><a href="{{route('user.add')}}"><i class="fa fa-circle-o"></i>Add User</a></li>
      </ul>
    </li>
    @endif
    <li><a href="{{route('posts')}}"><i class="fa fa-book"></i> <span>Post</span></a></li>
    @if(Auth::user()->hasRole('admin'))
    <li class="header">LABELS</li>
    <li><a href="{{route('roles')}}"><i class="fa fa-circle-o text-red"></i> <span>Role</span></a></li>
    <li><a href="{{route('permissions')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Permission</span></a></li>
    @endif
  </ul>
</section>
<!-- /.sidebar -->
</aside>