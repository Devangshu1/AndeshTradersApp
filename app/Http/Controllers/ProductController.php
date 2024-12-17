<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    public function addProductDB(request $req){
        $req->validate([
            'add_product_name'=>'required|string|max:100',
            'add_product_desc'=>'required|string|max:2500',
            'add_product_price'=>'required|numeric|min:1',
            'add_product_status'=>'required|in:Available,Out of Stock,Coming Soon',
            'add_product_img'=>'required|image|max:10240'
        ],[
            'add_product_img.required' => 'Product Image is required',
            'add_product_img.image' => 'Product Image is not a valid format(jpg, jpeg, png, bmp, gif, svg, or webp)',
            'add_product_img.max' => 'Product Image size must be less than 10MB!',
            'add_product_name.required' => 'Product Name is required!',
            'add_product_name.string' => 'Product Name must be String!',
            'add_product_name.max' => 'Product Name length can not be more than 100 letters!',
            'add_product_desc.required' => 'Product Description is Required!',
            'add_product_desc.string' => 'Product Description must be String!',
            'add_product_desc.max' => 'Product Description lengh can not be more than 2500 letters!',
            'add_product_price.required' => 'Product Price is Required!',
            'add_product_price.numeric' => 'Product Price must be Number!',
            'add_product_price.min' => 'Product Price can not be less than 1!',
            'add_product_status.required' => 'Product Status is Required!',
            'add_product_status.in' => 'Product Status can only either be Available or Out of Stock or Coming Soon!'
        ]);
        //$path = $req->file('add_product_img')->getRealPath(); 
        //$img = file_get_contents($path);
        //$imagename = base64_encode($img);
        $imagename = time().".".$req->add_product_img->extension();
        $req->add_product_img->move(public_path('product_images'),$imagename);
        //$req->add_product_img->storeAs('product_images/',$imagename);
        $addproduct = DB::table('products')->insert([
            'name'=>$req->add_product_name,
            'description'=>$req->add_product_desc,
            'image'=>$imagename,
            'price'=>$req->add_product_price,
            'product_status'=>$req->add_product_status
        ]);
        $products = DB::table('products')
                    ->orderby('product_id')
                    ->get();
        return redirect()->route('products')->with('product','Product added successfully!');
    }

    public function addProduct(){
        if(session()->has('login_success') && session()->get('login_success'))
        {
        return view('product/add_product');
        }
        else{
            return redirect()->route('admin.login');
        }
    }

    public function viewProduct($id){
        $product = DB::table('products')
                    ->where('product_id','=',$id)
                    ->get();
        $orders = DB::table('orders')
                    ->where('product_id','=',$id)
                    ->count('order_id');
        if(isset($product[0])){
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('product/view_product',['product'=>$product,'id'=>$id,'orders'=>$orders]);
        }
        else{
            return redirect()->route('admin.login');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function editProduct($id){
        $product = DB::table('products')
                    ->where('product_id','=',$id)
                    ->get();
        if(isset($product[0])){
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('product/edit_product',['product'=>$product,'id'=>$id]);
        }
        else{
            return redirect()->route('admin.login');
        }
        }
        else{
            return redirect()->back();
        }
    }

    public function editProductDB(request $req,$id){
        $req->validate([
            'edit_product_name'=>'required|string|max:100',
            'edit_product_desc'=>'required|string|max:2500',
            'edit_product_price'=>'required|numeric|min:1',
            'edit_product_img'=>'nullable|image|max:10240',
            'edit_product_status'=>'required'
        ],[
            'edit_product_img.image' => 'Product Image is not a valid format(jpg, jpeg, png, bmp, gif, svg, or webp)',
            'edit_product_img.max' => 'Product Image size must be less than 10!',
            'edit_product_name.required' => 'Product Name is required!',
            'edit_product_name.string' => 'Product Name must be String!',
            'edit_product_name.max' => 'Product Name length can not be more than 100 letters!',
            'edit_product_desc.required' => 'Product Description is Required!',
            'edit_product_desc.string' => 'Product Description must be String!',
            'edit_product_desc.max' => 'Product Description lengh can not be more than 2500 letters!',
            'edit_product_price.required' => 'Product Price is Required!',
            'edit_product_price.numeric' => 'Product Price must be Number!',
            'edit_product_price.min' => 'Product Price can not be less than 1!',
            'edit_product_status.required' => 'Product Status is Required!'
        ]);
        if(isset($req->edit_product_img)){
            //$path = $req->file('edit_product_img')->getRealPath(); 
            //$img = file_get_contents($path);
            //$imagename = base64_encode($img);
            $imagename=time().'.'.$req->edit_product_img->extension();
            $req->edit_product_img->move(public_path('product_images'),$imagename);
            //$req->edit_product_img->storeAs('public\product_images',$imagename);
            $editproduct = DB::table('products')
            ->where('product_id','=',$id)
            ->update([
                'name'=>$req->edit_product_name,
                'description'=>$req->edit_product_desc,
                'price'=>$req->edit_product_price,
                'image'=>$imagename,
                'product_status'=>$req->edit_product_status
            ]);
        }else{
        $editproduct = DB::table('products')
                        ->where('product_id','=',$id)
                        ->update([
                            'name'=>$req->edit_product_name,
                            'description'=>$req->edit_product_desc,
                            'price'=>$req->edit_product_price,
                            // 'image'=>$req->edit_product_img,
                            'product_status'=>$req->edit_product_status
                        ]);
        }
        return redirect()->route('products')->with('product','Product updated successfully!');
    }

    public function deleteProduct(Request $req,$id){
        $imagename = DB::table('products')
        ->select('image')
        ->where('product_id','=',$id)
        ->get();
        foreach($imagename as $i){
             File::delete('product_images/'.$i->image);
            //unlink('storage\product_images\\'.$i->image);
        }
        $deleteproduct = DB::table('products')
                            ->where('product_id','=',$id)
                            ->delete();
        return redirect()->route('products')->with('product','Product deleted successfully!');
    }
}
