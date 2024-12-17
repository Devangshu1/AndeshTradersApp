@extends('master_layout')

@section('users')
    active
@endsection

@section('navbar')
    View User
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title"><h2><strong>User Details</strong></h2></h1>
      </div>
      <div class="card-body p-0">
        <table class="table">
            <tr>
                <td><h5>User Id: </h5></td>
                <td><h5>{{$user[0]->user_id}}</h5></td>
            </tr>
            <tr>
                <td><h5>Username: </h5></td>
                <td><h5>{{$user[0]->username}}</h5></td>
            </tr>
            <tr>
                <td><h5>Email Id: </h5></td>
                <td><h5>{{$user[0]->email}}</h5></td>
            </tr>
            <tr>
                <td><h5>Phone No: </h5></td>
                <td>
                    @if($user[0]->phone == null)
                    <h5 class="text-danger">NO DATA</h5>
                    @else
                    <h5> {{$user[0]->phone}} </h5>
                    @endif    
                </td>
            </tr>
            <tr>
                <td><h5>Address: </h5></td>
                <td>
                    @if($user[0]->address == null)
                    <h5 class="text-danger">NO DATA</h5>
                    @else
                    <h5> {{$user[0]->address}} </h5>
                    @endif    
                </td>
            </tr>
            <tr>
                <td><h5>Account Detail: </h5></td>
                <td><h5>
                    <small><b>Account No: </b></small>
                        @if($user[0]->account == null)
                        <span class="text-danger">NO DATA</span>
                        @else
                        <span> {{$user[0]->account}} </span>
                        @endif    
                        <br/>
                    <small><b>IFSC Code: </b></small>
                        @if($user[0]->ifsc == null)
                        <span class="text-danger">NO DATA</span>
                        @else
                        <span> {{$user[0]->ifsc}} </span>
                        @endif    
                        <br/>
                    <small><b>Bank Name: </b></small>
                        @if($user[0]->bank == null)
                        <span class="text-danger">NO DATA</span>
                        @else
                        <span> {{$user[0]->bank}} </span>
                        @endif    
                        <br/>
                    <small><b>Branch Name: </b></small>
                        @if($user[0]->branch == null)
                        <span class="text-danger">NO DATA</span>
                        @else
                        <span> {{$user[0]->branch}} </span>
                        @endif    
                        <br/>         
                </h5></td>
            </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary btn-md mr-3 mb-4" href="{{route('users')}}">
            <i class="fas fa-back">
            </i>
            < Back
        </a>
    </div>
  
  </section>
  <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->
  
  </div>
  <!-- ./wrapper -->
@endsection
