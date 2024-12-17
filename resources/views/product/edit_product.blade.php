

@extends('master_layout')

@section('products')
    active
@endsection

@section('navbar')
    Edit Product
@endsection
    
@section('body')
    
<!-- Main content -->
<section class="content">
    <form action="{{route('edit.product.db',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                @foreach($product as $p)
                <div class="form-group">
                    <label for="edit_product_id"><h5>Product Id</h5></label>
                    <input type="number" class="form-control" id="edit_product_id" name="edit_product_id" placeholder="Enter product name" value="{{$p->product_id}}" disabled>
                </div>
                <div class="form-group">
                    <label for="edit_product_name"><h5>Product Name</h5></label>
                    <input type="text" class="form-control @error('edit_product_name') is-invalid @enderror" id="edit_product_name" name="edit_product_name" placeholder="Enter product name" value="{{old('edit_product_name',$p->name)}}">
                    <div class="text-danger">
                        @error('edit_product_name')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_product_desc"><h5>Product Description</h5></label>
                    <textarea name="edit_product_desc" id="edit_product_desc" cols="30" rows="3" class="form-control @error('edit_product_desc') is-invalid @enderror" placeholder="Enter product description">{{old('edit_product_desc',$p->description)}}</textarea>
                    <div class="text-danger">
                        @error('edit_product_desc')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_product_img"><h5>Upload Product Image </h5></label><br/>
                    <img src="{{asset('/public/product_images/'.$p->image)}}" alt="Product Image" height="150px" width="150px">
                    <input type="file" id="edit_product_img" name="edit_product_img" class="form-control @error('edit_product_img') is-invalid @enderror">
                    @error('edit_product_img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="edit_product_price"><h5>Product Price(in INR)</h5></label>
                    <input type="number" class="form-control @error('edit_product_price') is-invalid @enderror" id="edit_product_price" name="edit_product_price" placeholder="Enter product price" value="{{old('edit_product_price',$p->price)}}">
                    <div class="text-danger">
                        @error('edit_product_price')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_product_status"><h5>Product Status</h5></label>
                    <select name="edit_product_status" id="edit_product_status" value="{{old('edit_product_status',$p->product_status)}}" class="form-control  @error('edit_product_status') is-invalid @enderror">
                    @if(old('edit_product_status')==null)
                        @if($p->product_status=='Available')
                            <option value="Available" selected>Available</option>
                        @else
                            <option value="Available">Available</option>
                        @endif

                        @if($p->product_status=='Out of Stock')
                            <option value="Out of Stock" selected>Out of stock</option>
                        @else
                            <option value="Out of Stock">Out of stock</option>
                        @endif

                        @if($p->product_status=='Coming Soon')
                            <option value="Coming Soon" selected>Coming Soon</option>
                        @else
                            <option value="Coming Soon">Coming Soon</option>
                        @endif  
                    @else
                        @if(old('edit_product_status')=='Available')
                            <option value="Available" selected>Available</option>
                        @else
                            <option value="Available">Available</option>
                        @endif

                        @if(old('edit_product_status')=='Out of Stock')
                            <option value="Out of Stock" selected>Out of stock</option>
                        @else
                            <option value="Out of Stock">Out of stock</option>
                        @endif

                        @if(old('edit_product_status')=='Coming Soon')
                            <option value="Coming Soon" selected>Coming Soon</option>
                        @else
                            <option value="Coming Soon">Coming Soon</option>
                        @endif  
                    @endif  
                    </select>
                    <div class="text-danger">
                        @error('edit_product_status')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
            <button class="btn btn-info btn-md mr-5 mb-4" type="submit">
                Update
            </button>
            <a class="btn btn-secondary btn-md mr-2 mb-4" type="submit" href="{{route('products')}}">
                Cancle
            </a>
        </div>
    </form>

</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
@endsection
