<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdcuctController extends Controller
{
    //
    public function index(){
       // $sp=DB::table('product')->orderBy ('name')->get();
        $sp=product::paginate(5);
        return view('Product/form',compact('sp'));
    }
   
    public function Themmoi() {
        $brand=DB::table("brand_sps")->get();
        $cate=DB::table("categories")->get();
        $anh=DB::table("images")->get();
        
        return view("Product/themsp",compact("cate","brand","anh"));
    }
    
    public function form(){
        return view('upload.form');
    }
    public function upload(Request $request){
        $rules = ['upload' => 'required:mimes:jpeg,png,gif'];
        $mesages = [
            'upload.required' => 'Vui lòng chọn một file',
            'upload.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];
        $request->validate($rules,$mesages);
        $file_name = $request->img->getClientOriginalName();
        $request->upload->move(public_path('uploads'),$file_name);
        return redirect()->back()->with('success',"Upload ảnh thành công");
    }
    public function save(Request $request){
        $file_name = $request->img->getClientOriginalName();
        $id=$request['id'];
        $name=$request['name'];
        $price=$request['price'];
        $sale=$request['price_sale'];
        $content=$request['content'];
        $brand=$request['brand_id'];
        $cate=$request['category_id'];
        $status=$request['status'];
        if($request->img)
        {
            $filename=$request->img->getClientOriginalName();
            $request->img->move(public_path('img'),$filename);
            $img='/img/'.$filename;
        }
        else{
            $img="";
        }
        DB::table('products')->insert([
            'name'=>$name,
            'price'=>$price,
            'sale_price'=>$sale,
            'content'=>$content,
            'brand_id'=>$brand,
            'category_id'=>$cate,
            'status'=>$status,
            'img'=> $file_name,
        ]);
        return redirect()->route('form');

    }
    public function sua($id){
        $sp = DB::table('products')
        ->orderBy('Name')->find($id);
        $brand=DB::table("brand_sps")->get();
        $cate=DB::table("categories")->get();
        $anh=DB::table("images")->get();
        return view("Product/Sua",compact('sp','brand','cate',"anh"));
    }
    public function luu(Request $request, $id){
        //dd( $request->img->getClientOriginalName());
        $file_name = $request->img->getClientOriginalName();
        $id=$request['id'];
        $name=$request['name'];
        $price=$request['price'];
        $sale=$request['price_sale'];
        $content=$request['content'];
        $brand=$request['brand_id'];
        $cate=$request['category_id'];
        $status=$request['status'];
        if($request->img)
        {
            $filename=$request->img->getClientOriginalName();
            $request->img->move(public_path('img'),$filename);
            $img='/img/'.$filename;
        }
        else{
            $img="";
        }
        DB::table('products')->where('id',$id)->update([
            'name'=>$name,
            'price'=>$price,
            'sale_price'=>$sale,
            'content'=>$content,
            'brand_id'=>$brand,
            'category_id'=>$cate,
            'status'=>$status,
            'img'=> $file_name,
        ]);
        return redirect()->route('form');
    }
    
    public function xoa($id){
        DB::table('products')->where('id',$id)->delete(); 
        return redirect()->route('form'); 
    }

    //ảnh
    public function Themanh($id){
        $sp=DB::table('products')->find($id);
        $name=$sp->name;
        // Lấy ra danh sách ảnh
        $proImg=DB::table('images')->where('product_id',$id)->get();
        return view('/Product/proanh',compact('name','id','proImg'));
    }
    public function Luuanhsanpham(Request $request){
        $id=$request['id'];
        //Lấy ảnh 
        if($request->img)
    {
        $filename=$request->img->getClientOriginalName();
        $request->img->move(public_path('img'),$filename);
        $img='/img/'.$filename;
    }
    else{
        $img="";
    }
    DB::table('images')->insert([
        'img'=>$img,
        'product_id'=>$id
    ]);
    return redirect()->back();
    }
    public function Xoaanh($id){
        $img=DB::table('images')->where('id',$id)->delete();
        return redirect()->back();
    }
}
