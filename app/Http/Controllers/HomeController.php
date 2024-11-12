<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;




class HomeController extends Controller
{
    public function home(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index',compact('product','count'));
    }
    public function login_home(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index',compact('product','count'));
    }
    public function index(){
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }
    public function product_detail($id){
        $data = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_detail',compact('data','count'));
    }
    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();
        toastr()->closeButton()->addSuccess('Product Added To Cart Successfully');
        return redirect()->back();
        

    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
            $cart = cart::where('user_id',$userid)->get();
        }
            
        return view('home.mycart',compact('count','cart'));
    }
    public function remove_product($id){
        $data = cart::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('Product Removed Succesfully');
        return redirect()->back();
    }
    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

            $cart_remove = cart::where('user_id',$userid)->get();
            foreach($cart_remove as $remove){
                $data = cart::find($remove->id);
                $data->delete();
            }
        }
        toastr()->closeButton()->addSuccess('Order Placed Succesfully');
        return redirect()->back();
    }
    public function myorders(){
        $user = Auth::user();
        $userid = $user->id;
        $count = cart::where('user_id',$userid)->count();
        $order = Order::where('user_id',$userid)->get();
        return view('home.myorders',compact('count','order'));
    }
    public function stripe($value)

    {

        return view('home.stripe',compact('value'));

    }
    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value ,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Payment Successfull." 

        ]);

      

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        
        $userid = Auth::user()->id;
        $cart = cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'paid';
            $order->save();

            $cart_remove = cart::where('user_id',$userid)->get();
            foreach($cart_remove as $remove){
                $data = cart::find($remove->id);
                $data->delete();
            }
        }
        toastr()->closeButton()->addSuccess('Order Placed Succesfully');
        return redirect('mycart');

    }
    public function shop(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.shop',compact('product','count'));
    }
    public function why(){
        
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.why',compact('count'));
    }
    public function testimonial(){
        
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.testimonial',compact('count'));
    }
    public function contact(){
        
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.contact',compact('count'));
    }

    

}
