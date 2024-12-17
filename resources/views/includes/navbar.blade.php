<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @if(session('login_status'))
        <h6 class="alert alert-success">{{session('login_status')}}</h6>
      @endif
        <div class="row mb-2">
          <div class="col-sm-12">
          <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- main-header  -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <!-- d-none d-sm-inline-block -->
              <a href="#" class="nav-link">@yield('navbar')</a>
              <!-- <h1 class="m-0">Dashboard</h1> -->
            </li>
          </ul>
          </nav>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
