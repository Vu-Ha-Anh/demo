<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index(){
        $ban=DB::table('banners')
        ->orderBy ('name')
        ->get();      
        
        return view('Banner/form',compact('ban'));
     }
     public function themban() {
        $ban=DB::table("banners")->get();
        return view('Banner/them',compact('ban'));
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
    public function saveban(Request $request){
        $id=$request['id'];
        $name=$request['name'];
        if($request->img)
        {
            $filename=$request->img->getClientOriginalName();
            $request->img->move(public_path('img'),$filename);
            $img='/img/'.$filename;
        }
        else{
            $img="";
        }
        DB::table('banners')->insert([
            'name'=>$name,
            'img'=>$img,
        ]);
       
        return redirect()->route('formbanner');
         
    }
     public function xoaban($id){
        DB::table('banners')->where('id',$id)->delete();
        return redirect()->route('formbanner');
     }
}
