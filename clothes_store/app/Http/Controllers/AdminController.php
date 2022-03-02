<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    }
    public function uploadproduct(Request $request){
        //validation
        //change name image
        //upload
        //save

//change name image
   $this->validate($request, [
        'title' => 'required',
        'price' => 'required',
        'desc' => 'required',
        'quantity' => 'required'
    ]);
    $data = new product;
    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->desc;
    $data->quantity = $request->quantity;

    if(request()->hasFile('file')){
    $image = $request->file('file');
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->file->move('productimage',$imagename);
    $data->image = $imagename;
    }

    $data->save();

    return redirect()->back()->with('message','Product Added Successfully');

}
public function showproduct(){
    $products = Product::all();
    return view('admin.showproduct',compact('products',$products));
}
public function updateproduct($id){
    $product = Product::find($id);
    return view('admin.updateproduct',compact('product',$product));
}

public function uploadproductupdated(Request $request,$id){
    $product = Product::find($id);
    $this->validate($request, [
        'title' => 'required',
        'price' => 'required',
        'desc' => 'required',
        'quantity' => 'required'
    ]);
    $product->title = $request->title;
    $product->price = $request->price;
    $product->description = $request->desc;
    $product->quantity = $request->quantity;

    if(request()->hasFile('file')){
    $image = $request->file('file');
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->file->move('productimage',$imagename);
    $product->image = $imagename;
    }

    $product->save();

    return redirect()->back()->with('message','Product Updated Successfully');
}
public function order(){
    $selectproduct = Product::select('id','title','price')->get();

    return view("admin.order",compact('selectproduct'));
}
public function deleteproduct($id){
    $product = Product::find($id);
    $product->delete();
    return redirect()->back()->with('message','Product Deleted Successfully');
}
public function makeorder(Request $request){
    $order = new Order();

    $order->name = $request->name;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->product = $request->product;
    $order->price = $request->price;
    $order->quantity = $request->quantity;


    $order->save();
    return redirect()->back()->with('message','Order in Progress');

}
}
