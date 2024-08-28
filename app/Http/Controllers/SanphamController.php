<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SanphamController extends Controller
{
    //
    public function index(){
        $sp=DB::table('products')
        ->orderBy ('name')->get();      
        return view('Giaodien/sanpham',compact('sp'));
     }
     public function chitiet($content,$id){
        $sp=DB::table("products")->find($id);
        return view ("Giaodien/spchitiet",compact('sp'));
    }
    public function banner(){
        $ban=DB::table('banners')
        ->orderBy ('name')->get();      
        return view('Giaodien/banner',compact('ban'));
     }
     public function trangchu(){
        $ban=DB::table('banners')->orderBy ('name')->get();      
        $sp=DB::table('products')->orderBy ('name')->get(); 
        return view('Giaodien/master',compact('ban','sp'));
     }
}
