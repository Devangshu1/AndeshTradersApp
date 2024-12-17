

@extends('master_layout')

@section('products')
    active
@endsection

@section('navbar')
    Add Product
@endsection
    
@section('body')
    
<!-- Main content -->
<section class="content">
    <form action="{{route('add.product.db')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="add_product_name"><h5>Product Name</h5></label>
                    <input type="text" class="form-control @error('add_product_name') is-invalid @enderror" id="add_product_name" name="add_product_name" placeholder="Enter product name" value="{{old('add_product_name')}}">
                    <div class="text-danger">
                        @error('add_product_name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_product_desc"><h5>Product Description</h5></label>
                    <textarea name="add_product_desc" id="add_product_desc" cols="30" rows="3" class="form-control @error('add_product_desc') is-invalid @enderror " placeholder="Enter product description">{{old('add_product_desc')}}</textarea>
                    <div class="text-danger">
                        @error('add_product_desc')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                            <label for="add_product_img"><h5>Upload Product Image</h5></label>
                            <input type="file" id="add_product_img" name="add_product_img" class="form-control @error('add_product_img') is-invalid @enderror" value="{{old('add_product_img')}}">
                    <div class="text-danger">
                        @error('add_product_img')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_product_price"><h5>Product Price(in INR)</h5></label>
                    <input type="number" class="form-control @error('add_product_price') is-invalid @enderror" id="add_product_price" name="add_product_price" placeholder="Enter product price" value="{{old('add_product_price')}}">
                    <div class="text-danger">
                        @error('add_product_price')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_product_status"><h5>Product Status</h5></label>
                    <select name="add_product_status" id="add_product_status" value="{{old('add_product_status')}}" class="form-control @error('add_product_status') is-invalid @enderror">
                        <option value="Available" selected>Available</option>
                        <option value="Out of Stock">Out of stock</option>
                        <option value="Coming Soon">Coming Soon</option>
                    </select>
                    <div class="text-danger">
                        @error('add_product_status')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
            <button class="btn btn-info btn-md mr-5 mb-4" type="submit">
                Add Product
            </button>
            <a class="btn btn-secondary btn-md mr-2 mb-4" href="{{route('products')}}">
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
