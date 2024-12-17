@extends('master_layout')

@section('sales')
    active
@endsection

@section('navbar')
    Sales
@endsection
    
@section('body')

<!-- Main content -->
<section class="content">
  @empty($products[0])
  <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>No Sales Record</strong></h4></div>
  @else
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h1 class="card-title">Sale's Details</h1>
    </div>
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
                  <th style="width: 10%">
                      Sold Quantity
                  </th>
                  <th style="width: 15%">
                      Revenue Generated (in INR)
                  </th>
                  <th style="width: 25%">
                  </th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>
                    {{$product->product_id}}
                  </td>
                  <td>
                    <strong>{{$product->name}}</strong>
                  </td>
                  <td>
                    {{$product->description}}
                  </td>
                  <td>
                    {{$totalsold}}
                  </td>
                  <td>
                    &#8377; {{($totalsold)*($product->price)}}
                  </td>
                  <td class="project-actions">
                      <a class="btn btn-primary btn-sm" href="{{route('product.order',$product->product_id)}}">
                          <i class="fas fa-eye">
                          </i>
                          View Orders
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('edit.product',$product->product_id)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Update Product
                      </a>
                      {{-- <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a> --}}
                  </td>
              </tr>
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  @endempty
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
@endsection