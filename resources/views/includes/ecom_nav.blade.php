<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('ecom')}}">E-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mr-2" type="submit">Search</button>
      </form>
      @if(session('user_login'))
      <a href="{{route('ecom.user',session('ecom_username'))}}" class="btn btn-warning mr-2">
        <i class="fa fa-user"></i> 
        {{session('ecom_username')}}
      </a>
      <button type="button" class="btn btn-outline-danger mr-2" data-toggle="modal" data-target="#logoutUserModal">
        Logout
        </button>
      @else
      <a href="{{route('ecom.signup')}}" type="button" class="btn btn-success mr-2">
        Sign Up
      </a>
      <a href="{{route('ecom.login')}}" type="button" class="btn btn-success mr-2">
        Login
      </a>
      @endif
    </div>
  </nav>

  <div class="modal fade" id="logoutUserModal" tabindex="-1" role="dialog" aria-labelledby="logoutUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutUserModal">Logout from E-commerce</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <strong>Are you sure you want to logout from E-commerce?</strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
          <form action="{{route('ecom.logout')}}" method="POST">
            @csrf
          <button href="" type="submit" class="btn btn-primary">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
