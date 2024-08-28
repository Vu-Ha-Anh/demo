<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
    //
    public function index(){
        $cate=DB::table('categories')
        ->orderBy ('name')
        ->get();      
        return view('Category/form',compact('cate'));
     }
     public function Themcate() {
        $cate=DB::table("categories")->get();
        return view('Category/them',compact('cate'));
    }
    public function savecate(Request $request){
        $id=$request['id'];
        $name=$request['name'];
        $status=$request['status'];
        DB::table('categories')->insert([
            'name'=>$name,
            'status'=>$status,
        ]);
        return redirect()->route('formcate');
    }
    public function suacate($id){
        $cate=DB::table("categories")->orderBy('id')->find($id);
        return view('Category/sua',compact('cate'));
     }
     public function luucate(Request $request, $id){
        $id=$request['id'];
        $name=$request['name'];
        $status=$request['status'];
        DB::table('categories')->where('id',$id)->update([
            'id'=>$id,
           'name'=>$name,
           'status'=>$status,
        ]);
        return redirect()->route('formcate');
     }
     public function xoacate($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('formcate');
     }
}
