
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/img/title.png" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ auth('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @admin('super')
                                        <a class="dropdown-item" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                                        <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                                    @endadmin
                                        <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                                    <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/emis.png" alt="EMIS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name','EMIS')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @admin('admin')
          <img src="/img/admin.png" class="img-circle elevation-2" alt="Admin Image">
          @endadmin
          @admin('parent')
          <img src="/img/parents.png" class="img-circle elevation-2" alt="Parents Image">
          @endadmin
          @admin('teacher')
          <img src="/img/teacher.png" class="img-circle elevation-2" alt="Teacher Image">
          @endadmin
          @admin('student')
          <img src="/img/student.png" class="img-circle elevation-2" alt="Student Image">
          @endadmin
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="fa fa-tachometer-alt"></i>
              <p style="font-weight:bold">
                Navigate Here
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link active">
                    <i class="fas fa-home"></i>
                  <p><strong>Home</strong></p>
                </a>
              </li>
              <li class="nav-item">
                 @admin('admin,teacher')
                <a href="{{route("records.index")}}" class="nav-link" style="background-color:darkgray; color:black">
                 @admin('admin,teacher')
                    <i class="fas fa-database"></i>
                  <p><strong>Student Info</strong></p>
                  @endadmin
                  @admin('student')
                  <i class="fas fa-address-card"></i>
                  <p><strong>Your Info</strong></p>
                  @endadmin
                </a>
                @endadmin
                  @admin('parent')
                  <a href="{{url('/prview')}}" class="nav-link" style="background-color:darkgray; color:black">
                  <i class="fas fa-address-card"></i>
                  <p><strong>Your Child's Info</strong></p>
                </a>
                @endadmin
              </li>
              <li class="nav-item">
                    @admin('admin,teacher')
                <a href="{{ url('/selectclassresult') }}" class="nav-link" style="background-color:darkgray; color:black">
                    <i class="fas fa-graduation-cap"></i>
                  <p><strong>Result Management</strong></p>
                </a>
                @endadmin
                @admin('student')
                <a href="{{ url('/stdres') }}" class="nav-link" style="background-color:darkgray; color:black">
                    <i class="fas fa-graduation-cap"></i>
                  <p><strong>Result</strong></p>
                </a>
                @endadmin
              </li>


                <li class="nav-item">
                        @admin('admin,teacher')
                    <a href="{{ url('/selectclassattnd') }}" class="nav-link" style="background-color:darkgray; color:black">
                        <i class="fas fa-clipboard-check"></i>
                      <p style="font-size:13px"><strong>Student Attendance</strong></p>
                      @endadmin
                      @admin('parent')
                        <a href="{{url('/pratd')}}" class="nav-link" style="background-color:darkgray; color:black">
                            <i class="fas fa-clipboard-check"></i>
                        <p style="font-size:13px"><strong>Your Child's Attendance</strong></p>
                        </a>
                    @endadmin
                    </a>
                  </li>
              @admin('admin,student')
              <li class="nav-item">
                  <a href="{{url('/ttb')}}" class="nav-link" style="background-color:darkgray; color:black">
                    @admin('admin')
                    <i class="fas fa-calendar-alt"></i>
                    <p><strong>Schedule Management</strong></p>
                    @endadmin
                    @admin('student')
                    <i class="fas fa-calendar-alt"></i>
                    <p><strong>Classes Schedule</strong></p>
                    @endadmin
                  </a>
                </li>
                @endadmin
                @admin('admin,teacher,parent')
                <li class="nav-item">
                  @admin('admin,teacher')
                    <a href="{{url('/teachercmt')}}" class="nav-link" style="background-color:darkgray; color:black">
                        <i class="fas fa-hands-helping"></i>
                      <p style="font-size:12px"><strong>Parents Teacher Relationship</strong></p>
                    </a>
                    @endadmin
                    @admin('parent')
                    <a href="{{url('/prcmt')}}" class="nav-link" style="background-color:darkgray; color:black">
                      <i class="fas fa-hands-helping"></i>
                    <p style="font-size:12px"><strong>Parents Teacher Relationship</strong></p>
                  </a>
                  @endadmin
                  </li>
                  @endadmin
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    @yield('content')
  </div>

  <!-- Main Footer -->
  <footer class="main-footer py-2">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want I don't have
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="azun4@pcu.com">rotti.io</a>.</strong> All rights preserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
