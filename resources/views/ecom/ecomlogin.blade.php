@include('includes.header')

@include('includes.ecom_nav')

<!-- Horizontal Form -->
@if (session('login'))
          <div class="alert alert-danger mb-0">
            <h4 class="text-center">{{session('login')}}</h4>
          </div>
      @endif
@if (session('signup_success'))
          <div class="alert alert-success mb-0">
            <h4 class="text-center">{{session('signup_success')}}</h4>
          </div>
      @endif
<div class="jumbotron d-flex align-items-center min-vh-100 mb-0">
    <div class="container-sm" style="width: 30%;">
    <div class="card card-success">
        <div class="card-header">
          <h5 class="text-center mb-0"><strong>Login to E-commerce account</strong></h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('ecom.login.db')}}" method="POST">
            @csrf
          <div class="card-body">
            
            <div class="form-group">
                <label for="login_username">Username</label>
                <input type="text" class="form-control @error('login_username') is-invalid @enderror" id="login_username" name="login_username" placeholder="Enter username" value="{{old('login_username')}}">
                <div class="text-danger">
                    @error('login_username')
                      {{$message}}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="login_pass">Password</label>
                <input type="password" class="form-control @error('login_pass') is-invalid @enderror" id="login_pass" name="login_pass" placeholder="Enter password" value="{{old('login_pass')}}">
                <div class="text-danger">
                    @error('login_pass')
                      {{$message}}
                    @enderror
                </div>
            </div>

            <p class="mb-0">Admin? <a href="{{route('admin.login')}}">Login as admin</a></p>

          </div>
          <!-- /.card-body -->
          <div class="card-footer d-flex flex-row-reverse">
          <button type="submit" class="btn btn-success mr-2" id="login_submit">Login</button>
          <a href="{{route('ecom')}}" type="button" class="btn btn-secondary mr-2">Cancle</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
    

@include('includes.footer')