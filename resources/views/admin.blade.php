@include('includes.header')

<!-- Horizontal Form -->
<div class="jumbotron d-flex align-items-center min-vh-100 mb-0">
<div class="container-sm" style="width: 30%;">
<div class="card card-info">
    <div class="card-header">
      <h5 class="text-center mb-0"><strong>Admin Panel Login</strong></h5>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('admin.login.db')}}" method="POST">
        @csrf
      <div class="card-body">
        @if(session('login_status'))
          <h6 class="alert alert-danger">{{session('login_status')}}</h6>
        @endif
        <div class="form-group">
          <label for="admin_username"><h6>Admin Username</h6></label>
          <input type="text" class="form-control @error('admin_username') is-invalid @enderror" id="admin_username" placeholder="Enter Admin Username" name="admin_username" value="{{old('admin_username')}}">
          <div class="text-danger">
            @error('admin_username')
              {{$message}}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="admin_pass"><h6>Admin Password</h6></label>
            <input type="password" class="form-control @error('admin_pass') is-invalid @enderror" id="admin_pass" placeholder="Enter Admin Password" name="admin_pass" value="{{old('admin_pass')}}">
            <div class="text-danger">
                @error('admin_pass')
                  {{$message}}
                @enderror
              </div>
        </div>
        <p class="mb-0">Not Admin? <a href="{{route('ecom')}}">Visit E-commerce Website</a></p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
        <button type="submit" class="btn btn-info float-right">Login</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->
</div>
</div>


@include('includes.footer')