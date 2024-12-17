@include('includes.header')

@include('includes.ecom_nav')

<div class="container">
    <section class="content">
    <div class="card">
    <form action="{{route('ecom.buy.db',$product[0]->product_id)}}" method="POST">
        @csrf
    <div class="card-body">
        <table class="table">
            <tr>
                <td><b>Product Id: </b></td>
                <td>{{$product[0]->product_id}}</td>
            </tr>
            <tr>
                <td><b>Product Name: </b></td>
                <td>{{$product[0]->name}}</td>
            </tr>
            <tr>
                <td><b>Product Description: </b></td>
                <td>{{$product[0]->description}}</td>
            </tr>
            <tr>
                <td><b>Product Image: </b></td>
                <td><img src="{{asset('/public/product_images/'.$product[0]->image)}}" alt="Product Image" height="150px" width="150px"></td>
            </tr>
            <tr>
                <td><b>Product Price: </b></td>
                <td>&#8377; {{$product[0]->price}}</td>
            </tr>
            <div class="form-group">
            <tr>
                <td><label for="quantity">Quantity: </label></td>
                <td><input type="number" id=quantity name="quantity" class="form-control" placeholder="Enter quantity to order" value="{{old('quantity')}}" min="1" max="1000">
                <div class="text-danger">
                    @error('quantity')
                        {{$message}}
                    @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="payment_mode">Payment Mode: </label></td>
                <td><input type="radio" name="payment_mode" id="prepaid" class="form-check-input" value="Prepaid">  <label for="prepaid" class="form-check-label">Online</label><br/>
                <input type="radio" name="payment_mode" id="postpaid" class="form-check-input" value="Postpaid">  <label for="postpaid" class="form-check-label">Cash on Delivery</label>
                <div class="text-danger">
                    @error('payment_mode')
                        {{$message}}
                    @enderror
                </div>
            </td>
            </tr>
            </div>
        </table>
    </div>
    <div class="card-footer d-flex flex-row-reverse">
        @if (session('user_login'))
            @if(session('userdetail_add'.$user[0]->user_id))
            <button type="submit" class="btn btn-primary mr-2">Order</button>
            @else
            <a href="{{route('ecom.user',session('ecom_username'))}}" class="btn btn-primary mr-2">Add User Details to Order</a>
            @endif
        @else
        <a href="{{route('ecom.login')}}" type="button" class="btn btn-primary mr-2">Login to Order</a>
        @endif
        <a href="{{route('ecom')}}" type="button" class="btn btn-secondary mr-2">Cancle</a>
    </div>
    </form>
    </div>
    </section>
</div>

@include('includes.footer')