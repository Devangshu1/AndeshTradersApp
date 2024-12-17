@extends('master_layout')

@section('orders')
    active
@endsection

@section('navbar')
    View Order
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title"><h2><strong>Order Details</strong></h2></h1>
      </div>
      <div class="card-body p-0">
        <table class="table">
            <tr>
                <td><h5>Order Id: </h5></td>
                <td><h5>{{$order[0]->order_id}}</h5></td>
            </tr>
            <tr>
                <td><h5>Order Date: </h5></td>
                <td><h5>{{$order[0]->order_date}}</h5></td>
            </tr>
            <tr>
                <td><h5>Product Detail: </h5></td>
                <td><h5>
                    <small><b>Product Id: </b></small><span>{{$product[0]->product_id}}</span><br/>
                    <small><b>Name: </b></small><span>{{$product[0]->name}}</span><br/>
                    <small><b>Description: </b></small><span>{{$product[0]->description}}</span><br/>
                    <small><b>Price (in INR): </b></small><span>&#8377; {{$product[0]->price}}</span><br/>        
                </h5></td>
            </tr>
            <tr>
                <td><h5>User Detail: </h5></td>
                <td><h5>
                    <small><b>User Id: </b></small><span>{{$user[0]->user_id}}</span><br/>
                    <small><b>Username: </b></small><span>{{$user[0]->username}}</span><br/>
                    <small><b>Email: </b></small><span>{{$user[0]->e_email}}</span><br/>
                    <small><b>Phone No: </b></small><span>{{$user[0]->phoneno}}</span><br/>
                    <small><b>Address: </b></small><span>{{$user[0]->address}}</span><br/>
                </h5></td>
            </tr>
            <tr>
                <td><h5>Quantity: </h5></td>
                <td><h5>{{$order[0]->quantity}}</h5></td>
            </tr>
            <tr>
                <td><h5>Order Type: </h5></td>
                <td><h5>{{$order[0]->order_type}}</h5></td>
            </tr>
            <tr>
                <td><h5>Total Amount (in INR): </h5></td>
                <td><h5>&#8377; {{($order[0]->quantity)*($product[0]->price)}}</h5></td>
            </tr>
            <tr>
                <td><h5>Order Status: </h5></td>
                <td><h5>{{$order[0]->order_status}}</h5></td>
            </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-info btn-md mr-5 mb-4" href="{{route('update.order',$order[0]->order_id)}}">
            <i class="fas fa-pencil-alt">
            </i>
            Update
        </a>
        <a class="btn btn-secondary btn-md mr-2 mb-4" href="{{route('orders')}}">
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
