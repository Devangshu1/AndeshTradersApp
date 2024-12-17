@include('includes.header')

@include('includes.ecom_nav')

<!-- Horizontal Form -->
<div class="jumbotron d-flex align-items-center min-vh-100 mb-0">
  @if (session('signup_fail'))
      <div class="alert alert-danger">
        <h5 class="text-center">{{session('signup_fail')}}</h5>
      </div>
  @endif
    <div class="container-sm" style="width: 30%;">
    <div class="card card-success">
        <div class="card-header">
          <h5 class="text-center mb-0"><strong>Create new E-commerce account</strong></h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('ecom.signup.db')}}" method="POST">
            @csrf
          <div class="card-body">
            
            <div class="form-group">
                <label for="signup_email">Email</label>
                <input type="email" class="form-control @error('signup_email') is-invalid @enderror" id="signup_email" name="signup_email" placeholder="Enter email" value="{{old('signup_email')}}">
                <div class="text-danger">
                @error('signup_email')
                  {{$message}}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="signup_username">Username</label>
                <input type="text" class="form-control @error('signup_username') is-invalid @enderror" id="signup_username" name="signup_username" placeholder="Enter username" value="{{old('signup_username')}}">
                <div class="text-danger">
                @error('signup_username')
                  {{$message}}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="signup_pass">Password</label>
                <input type="password" class="form-control @error('signup_pass') is-invalid @enderror" id="signup_pass" name="signup_pass" placeholder="Enter password" value="{{old('signup_pass')}}">
                <div class="text-danger">
                @error('signup_pass')
                  {{$message}}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="signup_cpass">Confirm Password</label>
                <input type="password" class="form-control @error('signup_cpass') is-invalid @enderror" id="signup_cpass" name="signup_cpass" placeholder="Enter confirm password" value="{{old('signup_cpass')}}">
                <div class="text-danger">
                @error('signup_cpass')
                  {{$message}}
                @enderror
                </div>
            </div>
    
            <p class="mb-0">Admin? <a href="{{route('admin.login')}}">Login as admin</a></p>

          </div>
          <!-- /.card-body -->
          <div class="card-footer d-flex flex-row-reverse">
          <button type="submit" class="btn btn-success mr-2" id="signup_submit">Sign Up</button>
          <a href="{{route('ecom')}}" type="button" class="btn btn-secondary mr-2">Cancle</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
    

@include('includes.footer')