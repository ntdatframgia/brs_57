<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Share Book </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('css/all.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">

</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin:0">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home.index')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">B.S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Book Share</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">@lang('messages.toggle_navigation')</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            <li class=" user user-menu">
              <form class="navbar-form" role="search" action="{{ route('home.search') }}">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="title, category, author" name="keywork">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </li>
           @if(Auth::user()->role == 1)
          <li class=" user user-menu">
                <a href="{{ route('user.index')}}" > Admin </a>
          </li>
          @endif

          <li class=" user user-menu">
                <a href="{{ route('home.profile', Auth()->user()->id)}}/{{str_slug(Auth()->user()->fullname)}}.html"> Time Line</a>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img  src="{{ asset(Auth::user()->path_avatar) }}" class="user-image" alt="User Image">
              <span class="hidden-xs"> {{ Auth::user()->fullname }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img  src="{{ asset(Auth::user()->path_avatar) }}" class="img-circle" alt="User Image">
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('home.profile', Auth()->user()->id)}}/{{str_slug(Auth()->user()->fullname)}}.html" class="btn btn-default btn-flat">@lang('messages.profile')</a>
                </div>
                <div class="pull-right">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    <input type="submit" class="btn btn-default btn-flat" value="@lang('messages.logout')">
                    {{ csrf_field() }}
                </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img  src="{{asset(Auth::user()->path_avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <a href="{{ route('home.profile', Auth::user()->id )}}/{{str_slug(Auth()->user()->fullname)}}.html" class="img-circle" > {{ Auth::user()->fullname }} </a></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="{{ route('home.readding', Auth::user()->id)}}"><i class="fa fa-book"></i> List Readding Book</a></li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Manage Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('request.create')}}"><i class="fa fa-circle-o"></i>Request New Book</a></li>
            <li><a href="{{ route('request.show', auth()->user()->id)}}"><i class="fa fa-circle-o"></i>List Request</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">
  <h1>
    Blank page

  </h1>

</section> -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

        @yield('content')
        </div>
        <!-- /.box-footer-->
      </div>

      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.12
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<script src="{{url('js/all.js')}}"></script>

</body>
</html>
