<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('redirct');    
        }
        else
        {
            $data = Product::all();
            return view('user.home',compact('data',$data));
        }
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else
        {
            $data = Product::all();
            $user = auth()->user();
            $count = Cart::where('user_id',$user->id)->count();
            return view('user.home',compact('data',$data, 'count', $count));
        }
}
public function search(Request $request){
    $search = $request->search;
    if($search =='')
    {
        $user = auth()->user();
        $count = Cart::where('user_id',$user->id)->count();
        $data = Product::paginate(3);
        return view('user.home',compact('data',$data,'count',$count));
    }
    else if(isset($search))
    {
        $user = auth()->user();
        $count = Cart::where('user_id',$user->id)->count();
        $data = Product::where('title','Like','%'.$search.'%')->get();
        return view('user.home',compact('data',$data,'count',$count));
    }

}
public function addcart(Request $request,$id){
    if(Auth::id()){
        $user = auth()->user();
        $product = Product::find($id);
        $cart = new Cart;
        $cart->user_id          =   $user->id;
        $cart->product_title    =   $product->title;
        $cart->price            =   $product->price;
        $cart->quantity         =   $request->quantity;
        $cart->save();


        return redirect()->back()->with('message','Product Added');
    }
    else
    {
        return redirect('login');
    }
}
    public function showcart($id){
        $cartproducts = Cart::where('user_id',"=",$id)->get();
        return view('user.showcart', compact('cartproducts',$cartproducts));
    }
    public function deletecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
    return redirect()->back()->with('message','Product deleted form Cart ');

    }
}