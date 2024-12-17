@extends('master_layout')

@section('orders')
    active
@endsection

@section('navbar')
    Orders
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">
    @if (session('order_status_update'))
    <div class="alert alert-success">
      <h5 class="text-center mb-0">{{session('order_status_update')}}</h5>
    </div>
    @endif
    @empty($product[0])
              <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>No Orders</strong></h4></div>
  @else
    @empty($orders[0])
              <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>No Orders</strong></h4></div>
  @else
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">Order's Details</h1>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped" style=" table-layout: fixed;">
            <thead>
                <tr>
                    <th style="width: 7%;">
                        Order Id
                    </th>
                    <th style="width: 8%;">
                        Order Date
                    </th>
                    <th style="width: 18%;">
                        Product Detail
                    </th>
                    <th style="width: 18%;">
                        User Detail
                    </th>
                    <th style="width: 8%;">
                        Quantity
                    </th>
                    <th style="width: 8%;">
                        Order Type
                    </th>
                    <th style="width: 8%;">
                        Total Amount (in INR)
                    </th>
                    <th style="width: 8%;">
                        Order Status
                    </th>
                    <th style="width: 10%;">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>
                      {{$order->order_id}}
                    </td>
                    <td>
                        {{$order->order_date}}
                    </td>
                    <td>
                        <small>Product Id: </small><span>{{$product[0]->product_id}}</span><br/>
                        <small>Name: </small><span>{{$product[0]->name}}</span><br/>
                        <small>Description: </small><span>{{ Str::limit($product[0]->description, 100) }}</span><br/>
                        <small>Price (in INR): </small><span>&#8377; {{$product[0]->price}}</span><br/>
                    </td>
                    <td>
                        <small>User Id: </small><span>{{$user[0]->user_id}}</span><br/>
                        <small>Username: </small><span>{{$user[0]->username}}</span><br/>
                        <small>Email: </small><span>{{$user[0]->	e_email}}</span><br/>
                        <small>Phone No: </small><span>{{$user[0]->phoneno}}</span><br/>
                        <small>Address: </small><span>{{ Str::limit($user[0]->address, 100) }}</span><br/>
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
    <!-- /.card -->
  @endempty
@endempty
  </section>
  <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->
  
  </div>
  <!-- ./wrapper -->
@endsection
