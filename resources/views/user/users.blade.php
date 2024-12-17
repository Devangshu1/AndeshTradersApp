

@extends('master_layout')

@section('users')
    active
@endsection

@section('navbar')
    Users
@endsection
    
@section('body')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  @if(count($users)==0)
              <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>No Users Account</strong></h4></div>
  @else
  <div class="card">
    <div class="card-header">
      <h1 class="card-title">User's Details</h1>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped"  style=" table-layout: fixed;">
          <thead>
              <tr>
                  <th style="width: 8%">
                      User Id
                  </th>
                  <th style="width: 13%">
                      Username
                  </th>
                  <th style="width: 22%">
                      Contact
                  </th>
                  <th style="width: 25%">
                      Address
                  </th>
                  <th style="width: 20%">
                      Account detail
                  </th>
                  <th style="width: 10%">
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                  <td>
                    {{$user->user_id}}
                  </td>
                  <td>
                    <strong>{{$user->username}}</strong>
                  </td>
                  <td>
                    <small>Phone No: </small><span>
                      @if($user->phone == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->phone}}
                      @endif
                    </span><br/>
                    <small>Email: </small><span>{{$user->email}}</span><br/>
                  </td>
                  <td>
                    @if($user->address == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->address}}
                      @endif
                  </td>
                  <td>
                    <small>Account No: </small><span>
                      @if($user->account == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->account}}
                      @endif
                    </span><br/>
                    <small>IFSC Code: </small><span>
                      @if($user->ifsc == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->ifsc}}
                      @endif
                      </span><br/>
                    <small>Bank Name: </small><span>
                      @if($user->bank == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->bank}}
                      @endif
                      </span><br/>
                    <small>Branch Name: </small><span>
                      @if($user->branch == null)
                      <small class="text-danger">NO DATA</small>
                      @else
                      {{$user->branch}}
                      @endif
                      </span><br/>
                  </td>
                  <td class="project-actions">
                      <a class="btn btn-primary btn-sm" href="{{route('view.user',$user->user_id)}}">
                          <i class="fas fa-eye">
                          </i>
                          View
                      </a>
                      {{-- <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a> --}}
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  @endif

</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
@endsection