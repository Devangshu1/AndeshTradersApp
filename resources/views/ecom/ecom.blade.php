@include('includes.header')

@include('includes.ecom_nav')

<div class="container">
    <section class="content">
      @if (session('login'))
      <div class="alert alert-success mb-0">
        <h5 class="text-center">{{session('login')}}</h5>
      </div>
      @endif
      @if (session('user_detail'))
      <div class="alert alert-success mb-0">
        <h5 class="text-center">{{session('user_detail')}}</h5>
      </div>
      @endif
      @if (session('order'))
      <div class="alert alert-success mb-0">
        <h5 class="text-center">{{session('order')}}</h5>
      </div>
      @endif
        <!-- Default box -->
        @if(count($products)==0)
                    <div class="alert alert-light text-center" role="alert"><h4 class="mb-0"><strong>Under Maintenance</strong></h4></div>
        @else
        <div class="card">
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
                        <th style="width: 15%" class="text-center">
                            Image
                        </th>
                        <th style="width: 10%">
                            Price(in INR)
                        </th>
                        <th style="width: 10%">
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
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('ecom.view',$product->product_id)}}">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                            <a href="{{route('ecom.buy', $product->product_id)}}" type="button" class="btn btn-primary btn-sm @if(!($product->product_status == 'Available')) disabled @endif ">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Buy Now
                            </a>
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
</div>



@include('includes.footer')