<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class CartController extends Controller
{
    //
    public function index(Cart $cart){
        
        return view('Giaodien/viewcart',compact('cart'));
    }
    public function muahang($id,Cart $cart){
        $sp=DB::table("products")->find($id);    
        $cart->Add($sp,1);
        //dd($cart);
        return redirect()->route('view.cart');
    }

    public function xoahang($id,Cart $cart){
        $cart->Delete($id);
        return redirect()->route('view.cart');
    }
    public function capnhatsoluong(Request $request,Cart $cart){
        $id=$request['ma'];
        $sl=$request['soluong'];
       $cart->Update($id,$sl);
        return redirect()->route('view.cart');
    }
    public function huyhang(Cart $cart){
        $cart->Clear();
        return redirect()->route('view.cart');
    }
}
