<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    //
    public function index(){
        $th=DB::table('brand_sps')
        ->orderBy ('name')
        ->get();      
        return view('Brand/form',compact('th'));
     }
     public function Thembrand() {
        $th=DB::table("brand_sps")->get();
        return view('Brand/them',compact('th'));
    }
    public function savebrand(Request $request){
        $id=$request['id'];
        $name=$request['name'];
        $status=$request['status'];
        DB::table('brand_sps')->insert([
            'name'=>$name,
            'status'=>$status,
        ]);
        return redirect()->route('formbrand');
    }
    public function suabrand($id){
        $th=DB::table("brand_sps")->orderBy('id')->find($id);
        return view('Brand/sua',compact('th'));
     }
     public function luubrand(Request $request, $id){
        $id=$request['id'];
        $name=$request['name'];
        $status=$request['status'];
        DB::table('brand_sps')->where('id',$id)->update([
            'id'=>$id,
           'name'=>$name,
           'status'=>$status,
        ]);
        return redirect()->route('formbrand');
     }
     public function xoabrand($id){
        DB::table('brand_sps')->where('id',$id)->delete();
        return redirect()->route('formbrand');
     }
}
