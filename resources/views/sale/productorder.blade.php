@extends('master_layout')

@section('sales')
    active
@endsection

@section('navbar')
    All Product wise Orders
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title"><h5><strong>Product Details</strong></h5></h1>
      </div>
      <div class="card-body p-0">
        <table class="table">
            <tr>
                <td><h6>Product Id: </h6></td>
                <td><h6>{{$product[0]->product_id}}</h6></td>
            </tr>
            <tr>
                <td><h6>Product Name: </h6></td>
                <td><h6>{{$product[0]->name}}</h6></td>
            </tr>
            <tr>
                <td><h6>Product Description: </h6></td>
                <td><h6>
                    {{$product[0]->description}}
                </h6></td>
            </tr>
            <tr>
                <td><h6>Product Image: </h6></td>
                <td><h6>
                    <img src="{{asset('public/product_images/'.$product[0]->image)}}" alt="Product Image" height="200px" weight="200px">
                </h6></td>
            </tr>
            <tr>
                <td><h6>Price (in INR): </h6></td>
                <td><h6>&#8377; {{$product[0]->price}}</h6></td>
            </tr>
            <tr>
                <td><h6>Product Status: </h6></td>
                <td><h6>{{$product[0]->product_status}}</h6></td>
            </tr>
            <tr>
                <td><h6>Total Sold Quantity: </h6></td>
                <td><h6>{{$totalsold}}</h6></td>
            </tr>
            <tr>
                <td><h6>Total Revenue Generated: </h6></td>
                <td><h6>&#8377; {{($totalsold)*($product[0]->price)}}</h6></td>
            </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card">
        <div class="card-header">
          <h1 class="card-title"><h5><strong>Order's Details</strong></h5></h1>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped"  style=" table-layout: fixed;">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          Order Id
                      </th>
                      <th style="width: 10%">
                          Order Date
                      </th>
                      <th style="width: 20%">
                          User Detail
                      </th>
                      <th style="width: 10%">
                          Quantity
                      </th>
                      <th style="width: 10%">
                          Order Type
                      </th>
                      <th style="width: 10%">
                          Total Amount (in INR)
                      </th>
                      <th style="width: 10%">
                          Order Status
                      </th>
                      <th style="width: 17%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                  <tr>
                      <td>
                        {{$order->order_id}}
                      </td>
                      <td>
                        {{$order->order_date}}
                      </td>
                      <td>
                          <small>User Id: </small><span>{{$order->user_id}}</span><br/>
                          <small>Username: </small><span>{{$order->username}}</span><br/>
                          <small>Email: </small><span>{{$order->e_email}}</span><br/>
                          <small>Phone No: </small><span>{{$order->phoneno}}</span><br/>
                          <small>Address: </small><span>{{$order->address}}</span><br/>
                      </td>
                      <td>
                        {{$order->quantity}}
                      </td>
                      <td>
                        {{$order->order_type}}
                      </td>
                      <td>
                        &#8377; {{($order->quantity)*($product[0]->price)}}
                      </td>
                      <td>
                        {{$order->order_status}}
                      </td>
                      <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="{{route('view.order',$order->order_id)}}">
                              <i class="fas fa-eye">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{route('update.order',$order->order_id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Update
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

    <div class="d-flex flex-row-reverse">
        <a class="btn btn-secondary btn-md mr-2 mb-4" href="{{route('sales')}}">
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
