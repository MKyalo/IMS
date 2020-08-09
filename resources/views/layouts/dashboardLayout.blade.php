<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>IMS | DashBoard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('public/plugins/toastr/toastr.min.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
 </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
                $segment=Request::segment(1);
               ?>

               <li class="nav-item">
                  <a href="{{route('dashboard')}}" class="nav-link
                    @if($segment=='dashboard')
                      active
                    @endif
                    ">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
            @can('isAdmin')
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link
                    @if($segment=='users')
                      active
                    @endif
                    ">
                      <i class="nav-icon fas fa-users-cog"></i>
                    <p>User Management</p>
                  </a>
                </li>
            @endcan
                <li class="nav-item">
                  <a href="{{route('suppliers.index')}}" class="nav-link
                    @if($segment=='suppliers')
                      active
                    @endif
                    ">
                      <i class="nav-icon fas fa-truck"></i>
                    <p>Suppliers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('categories.index')}}" class="nav-link
                    @if($segment=='categories')
                      active
                    @endif
                    ">
                      <i class="nav-icon fas fa-truck"></i>
                    <p>Product Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('products.index')}}" class="nav-link
                    @if($segment=='products')
                      active
                    @endif
                    ">
                      <i class="nav-icon fas fa-truck"></i>
                    <p>Inventory Products </p>
                  </a>
                </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
            >
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  @yield('content')

  </div>
  <!-- /.content-wrapper -->
   <!-- Main Footer -->
   <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>