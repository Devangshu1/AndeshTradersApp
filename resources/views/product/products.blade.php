

@extends('master_layout')

@section('products')
    active
@endsection

@section('navbar')
    Products
@endsection
    
@section('body')
<!-- Main content -->
<section class="content">
  <div class="d-flex flex-row-reverse mr-3 mb-3">
    <a href="{{route('add.product')}}" class="btn btn-primary btn-md">
      <i class="nav-icon far fa-plus-square"></i>
      Add Product</a>
  </div>

  <!-- Default box -->
  @if(count($products)==0)
              <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>No Products Added</strong></h4></div>
  @else
  <div class="card">
    <div class="card-header">
      <h1 class="card-title">Products's Details</h1>
    </div>
    @if(session('product'))
      <h6 class="alert alert-success ml-3 mr-3 mt-3">{{session('product')}}</h6>
    @endif   
    <div class="card-body p-0">
      <table class="table table-striped"  style=" table-layout: fixed;">
          <thead>
              <tr>
                  <th style="width: 10%">
                      Product Id
                  </th>
                  <th style="width: 15%">
                      Name
                  </th>
                  <th style="width: 20%">
                      Description
                  </th>
                  <th style="width: 10%" class="text-center">
                      Image
                  </th>
                  <th style="width: 10%">
                      Price (in INR)
                  </th>
                  <th style="width: 15%">
                      Product Status
                  </th>
                  <th style="width: 20%">
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                  <td>
                    {{$product->product_id}}
                  </td>
                  <td>
                    <strong>{{$product->name}}</strong>
                  </td>
                  <td>
                    {{ Str::limit($product->description, 200) }}
                  </td>
                  <td class="text-center">
                    <img src="{{asset('/public/product_images/'.$product->image)}}" alt="Product Image" height="100px" weight="100px">
                  </td>
                  <td>
                    &#8377; {{$product->price}}
                  </td>
                  <td>
                    {{$product->product_status}}
                  </td>
                  <td class="project-actions">
                      <a class="btn btn-primary btn-sm" href="{{route('view.product',['id'=>$product->product_id])}}">
                          <i class="fas fa-eye">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('edit.product',['id'=>$product->product_id])}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_product_{{$product->product_id}}">
                        <i class="fas fa-trash"></i>
                        Delete
                      </button>

                      <div class="modal fade" id="delete_product_{{$product->product_id}}" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="Delete Modal">Delete Product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('delete.product',['id'=>$product->product_id])}}" method="POST">
                              @csrf
                            <div class="modal-body">
                              <h5>Are you sure you want to delete this product?</h5><br/>
                              <h6>Product Id: <strong>{{$product->product_id}}</strong></h6>
                              <h6>Product Name: <strong>{{$product->name}}</strong></h6>
                              <h6>Product Description: <strong>{{ Str::limit($product->description, 200) }}</strong></h6>
                              <h6>Product Image: <strong><img src="{{asset('public/product_images/'.$product->image)}}" alt="Product Image" height="100px" width="100px"></strong></h6>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                              <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>

                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="mt-3 mr-5 ml-5">
    <h6>{{$products->links()}}</h6>
  </div>
  @endif
  <!-- /.card -->

</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
@endsection
