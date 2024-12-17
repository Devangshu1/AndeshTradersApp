@include('includes.header')

@include('includes.ecom_nav')

<div class="container">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="col-10">
                  <img src="{{asset('/public/product_images/'.$product[0]->image)}}" class="product-image" alt="Product Image">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <p class="my-0">Product ID: {{$product[0]->product_id}}</p>
                <h2 class="my-2">{{$product[0]->name}}</h2>
                <h5>{{$product[0]->description}}</h5>
  
                <hr>
                <div class="col-4
                @if($product[0]->product_status=='Available') bg-success @endif
                @if($product[0]->product_status=='Out of Stock')bg-danger @endif
                @if($product[0]->product_status=='Coming Soon')bg-warning @endif
                text-center text-lg py-2 px-3">
                    <strong>{{$product[0]->product_status}}</strong>
                </div>
                <hr>
                <div class="bg-dark py-2 px-3 col-4 text-center">
                  <h2 class="mb-0">
                    &#8377; {{$product[0]->price}}
                  </h2>
                </div>
  
                <div class="mt-4">
                    <a href="{{route('ecom.buy',$product[0]->product_id)}}" type="button" class="btn btn-primary btn-lg @if(!($product[0]->product_status == 'Available')) disabled @endif ">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Buy Now
                    </a>
                </div>
                <div class="mt-5">
                    <a href="{{route('ecom')}}" class="btn btn-secondary btn-sm"> < back </a>
                </div>
  
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
      </section>
</div>

@include('includes.footer')