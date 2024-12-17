@extends('master_layout')

@section('products')
    active
@endsection

@section('navbar')
    View Product
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title"><h2><strong>Product Details</strong></h2></h1>
      </div>
      <div class="card-body p-0">
        <table class="table">
            @foreach ($product as $p)
            <tr>
                <td><h5>Product Id: </h5></td>
                <td><h5>{{$p->product_id}}</h5></td>
            </tr>
            <tr>
                <td><h5>Product Name: </h5></td>
                <td><h5>{{$p->name}}</h5></td>
            </tr>
            <tr>
                <td><h5>Product Description: </h5></td>
                <td><h5>
                    {{$p->description}}
                </h5></td>
            </tr>
            <tr>
                <td><h5>Product Image: </h5></td>
                <td><h5>
                    <img src="{{asset('/public/product_images/'.$p->image)}}" alt="Product Image" height="200px" width="200px">
                </h5></td>
            </tr>
            <tr>
                <td><h5>Price (in INR): </h5></td>
                <td><h5>&#8377; {{$p->price}}</h5></td>
            </tr>
            <tr>
                <td><h5>Product Status: </h5></td>
                <td><h5>{{$p->product_status}}</h5></td>
            </tr>
            <tr>
                <td><h5>Total Sold Quantity: </h5></td>
                <td><h5>{{$orders}}</h5></td>
            </tr>

            <div class="modal fade" id="delete_product_{{$p->product_id}}" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="Delete Modal">Delete Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('delete.product',['id'=>$p->product_id])}}" method="POST">
                      @csrf
                    <div class="modal-body">
                      <h5>Are you sure you want to delete this product?</h5><br/>
                      <h6>Product Id: <strong>{{$p->product_id}}</strong></h6>
                      <h6>Product Name: <strong>{{$p->name}}</strong></h6>
                      <h6>Product Description: <strong>{{$p->description}}</strong></h6>
                      <h6>Product Image: <strong>
                        <img src="{{asset('storage\product_images\\'.$p->image)}}" alt="Product Name" height="100px" width="100px"></strong></h6>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                      <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>

            @endforeach
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="d-flex flex-row-reverse">
        <button type="button" class="btn btn-danger btn-md mr-5 mb-4" data-toggle="modal" data-target="#delete_product_{{$id}}">
            <i class="fas fa-trash"></i>
            Delete Product
          </button>
        <a class="btn btn-info btn-md mr-2 mb-4" href="{{route('edit.product',['id'=>$id])}}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit Product
        </a>
        <a class="btn btn-secondary btn-md mr-2 mb-4" href="{{route('products')}}">
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
